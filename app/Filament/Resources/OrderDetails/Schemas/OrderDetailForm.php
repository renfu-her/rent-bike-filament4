<?php

namespace App\Filament\Resources\OrderDetails\Schemas;

use App\Models\Order;
use App\Models\Motorcycle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->label('訂單')
                    ->options(Order::pluck('order_no', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('請選擇訂單'),

                Select::make('motorcycle_id')
                    ->label('機車')
                    ->options(Motorcycle::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('請選擇機車'),

                TextInput::make('quantity')
                    ->label('數量')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->default(1)
                    ->placeholder('請輸入數量'),

                TextInput::make('subtotal')
                    ->label('小計')
                    ->numeric()
                    ->required()
                    ->prefix('NT$')
                    ->placeholder('請輸入小計'),

                TextInput::make('total')
                    ->label('總計')
                    ->numeric()
                    ->required()
                    ->prefix('NT$')
                    ->placeholder('請輸入總計'),
            ]);
    }
}
