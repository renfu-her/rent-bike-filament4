<?php

namespace App\Filament\Resources\Motorcycles\Schemas;

use App\Models\Store;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MotorcycleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('store_id')
                    ->label('所屬商店')
                    ->options(Store::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('請選擇商店'),

                TextInput::make('name')
                    ->label('機車名稱')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('請輸入機車名稱'),

                TextInput::make('model')
                    ->label('型號')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('請輸入機車型號'),

                TextInput::make('license_plate')
                    ->label('車牌號碼')
                    ->required()
                    ->maxLength(20)
                    ->placeholder('請輸入車牌號碼'),

                TextInput::make('price')
                    ->label('租金 (每日)')
                    ->numeric()
                    ->required()
                    ->prefix('NT$')
                    ->placeholder('請輸入每日租金'),

                Select::make('status')
                    ->label('狀態')
                    ->options([
                        'available' => '可出租',
                        'rented' => '已出租',
                        'maintenance' => '維修中',
                        'pending_checkout' => '待結帳',
                    ])
                    ->default('available')
                    ->required()
                    ->placeholder('請選擇狀態'),

                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->default(true)
                    ->helperText('啟用表示可正常使用'),
            ]);
    }
}
