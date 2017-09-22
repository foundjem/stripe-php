<?php

namespace Stripe;

class SourceTransactionTest extends TestCase
{
    public function testList()
    {
        $this->mockRequest(
            'GET',
            '/v1/sources/src_foo/source_transactions',
            array(),
            array(
                'object' => 'list',
                'url' => '/v1/sources/src_foo/source_transactions',
                'data' => array(
                    array(
                        'id' => 'srctxn_bar',
                        'object' => 'source_transaction',
                    ),
                ),
                'has_more' => false,
            )
        );

        $source = Source::constructFrom(
            array('id' => 'src_foo', 'object' => 'source'),
            new Util\RequestOptions()
        );

        $transactions = $source->sourceTransactions();

        $this->assertSame($transactions->url, '/v1/sources/src_foo/source_transactions');
        $this->assertSame(1, count($transactions->data));

        $transaction = $transactions->data[0];

        $this->assertInstanceOf(SourceTransaction::class, $transaction);
        $this->assertSame('srctxn_bar', $transaction->id);
    }
}
