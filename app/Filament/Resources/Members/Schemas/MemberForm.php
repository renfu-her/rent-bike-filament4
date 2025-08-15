<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('姓名')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('請輸入姓名'),

                TextInput::make('email')
                    ->label('電子郵件')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('請輸入電子郵件'),

                TextInput::make('password')
                    ->label('密碼')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->minLength(8)
                    ->placeholder('請輸入密碼'),

                TextInput::make('id_number')
                    ->label('身份證字號')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true)
                    ->placeholder('請輸入身份證字號'),

                TextInput::make('phone')
                    ->label('電話')
                    ->tel()
                    ->required()
                    ->maxLength(20)
                    ->placeholder('請輸入電話號碼'),

                TextInput::make('license_plate')
                    ->label('駕照號碼')
                    ->maxLength(20)
                    ->placeholder('請輸入駕照號碼'),

                Textarea::make('address')
                    ->label('地址')
                    ->required()
                    ->maxLength(500)
                    ->rows(3)
                    ->placeholder('請輸入完整地址'),

                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->default(true)
                    ->helperText('啟用表示可正常使用'),
            ]);
    }
}
