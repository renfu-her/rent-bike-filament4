<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('商店名稱')
                    ->required()
                    ->placeholder('請輸入商店名稱'),
                TextInput::make('phone')
                    ->label('電話')
                    ->tel()
                    ->required()
                    ->placeholder('請輸入電話號碼'),
                Textarea::make('address')
                    ->label('地址')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('請輸入完整地址'),
                Select::make('status')
                    ->label('狀態')
                    ->options([
                        1 => '啟用',
                        0 => '停用',
                    ])
                    ->default(1)
                    ->required()
                    ->placeholder('請選擇狀態'),
            ]);
    }
}
