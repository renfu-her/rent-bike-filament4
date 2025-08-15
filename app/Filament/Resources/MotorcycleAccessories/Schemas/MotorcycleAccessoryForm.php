<?php

namespace App\Filament\Resources\MotorcycleAccessories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MotorcycleAccessoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('model')
                    ->label('型號')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('請輸入配件型號'),

                TextInput::make('quantity')
                    ->label('數量')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->placeholder('請輸入數量'),

                Select::make('status')
                    ->label('狀態')
                    ->options([
                        '待出租' => '待出租',
                        '出租中' => '出租中',
                        '停用' => '停用',
                    ])
                    ->default('待出租')
                    ->required()
                    ->placeholder('請選擇狀態'),

                Textarea::make('description')
                    ->label('描述')
                    ->maxLength(500)
                    ->rows(3)
                    ->placeholder('請輸入配件描述'),
            ]);
    }
}
