<!-- Transactions -->
<div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Transactions</h2>
                <a href="/user/transactions" class="link">View All</a>
            </div>
            <div class="transactions">
                <ul class="listview flush transparent no-line image-listview detailed-list mt-1 mb-1">
                    @foreach($transactions as $transaction)
                        <li>
                            <a href="/user/transaction/data/{{ $transaction->id }}" class="item">
                                @if($transaction->type == 'deposit')
                                    <ion-icon class="text-success" name="arrow-down-outline" style="margin-right: 5px;"></ion-icon>
                                @elseif($transaction->type == 'withdrawal')
                                    <ion-icon class="text-danger" name="arrow-up-outline" style="margin-right: 5px;"></ion-icon>
                                @else
                                    <ion-icon class="text-success" name="refresh-outline" style="margin-right: 5px;"></ion-icon>
                                @endif

                                <iconify-icon style="font-size: 20px; margin-right: 8px;" icon="cryptocurrency-color:{{ $transaction->wallet->admin_wallet->currency_symbol }}"></iconify-icon>
                                <div class="in">
                                    <div>
                                        <strong>{{ ucfirst($transaction->currency) }}</strong>
                                        <div class="text-small text-secondary">{{ ucfirst($transaction->type) }}</div>
                                        <small class="text-{{ $transaction->status == 'pending' ? 'warning' : ($transaction->status == 'denied' ? 'secondary' : 'success') }}"><em style="font-size: 8px;">{{ $transaction->status }}</em></small>
                                    </div>
                                    <div class="text-end">
                                        <strong><span class="text-{{ $transaction->type == 'withdrawal' ? 'danger' : 'success' }}">{{ $transaction->type == 'withdrawal' ? '- ' : '+ ' }}</span>{{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $transaction->amount) }}</strong>
                                        <div class="text-small">
                                            {{ date_format(date_create($transaction->created_at), 'M d, Y H:i A') }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
        <!-- * Transactions -->