<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Member;
use App\Models\Store;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('store_id')
                    ->label('商店')
                    ->options(Store::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('請選擇商店'),

                Select::make('member_id')
                    ->label('會員')
                    ->options(Member::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('請選擇會員'),

                TextInput::make('order_no')
                    ->label('訂單編號')
                    ->default(fn () => \App\Models\Order::generateOrderNo())
                    ->disabled()
                    ->dehydrated()
                    ->helperText('系統自動生成'),

                DatePicker::make('rent_date')
                    ->label('租借日期')
                    ->required()
                    ->native(false)
                    ->displayFormat('Y-m-d')
                    ->placeholder('請選擇租借日期'),

                DatePicker::make('return_date')
                    ->label('歸還日期')
                    ->required()
                    ->native(false)
                    ->displayFormat('Y-m-d')
                    ->placeholder('請選擇歸還日期'),

                TextInput::make('total_price')
                    ->label('總金額')
                    ->numeric()
                    ->required()
                    ->prefix('NT$')
                    ->placeholder('請輸入總金額'),

                Toggle::make('is_completed')
                    ->label('完成狀態')
                    ->default(false)
                    ->helperText('標記訂單是否已完成'),

                Textarea::make('notes')
                    ->label('備註')
                    ->maxLength(500)
                    ->rows(3)
                    ->placeholder('請輸入備註'),
            ]);
    }
}
