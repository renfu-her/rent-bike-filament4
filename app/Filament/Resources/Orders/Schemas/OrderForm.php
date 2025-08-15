<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Member;
use App\Models\Motorcycle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('member_id')
                    ->label('會員')
                    ->options(Member::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('請選擇會員'),

                Select::make('motorcycle_id')
                    ->label('機車')
                    ->options(Motorcycle::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('請選擇機車'),

                TextInput::make('order_number')
                    ->label('訂單編號')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true)
                    ->placeholder('請輸入訂單編號'),

                DateTimePicker::make('rent_start_date')
                    ->label('租借開始時間')
                    ->required()
                    ->native(false)
                    ->displayFormat('Y-m-d H:i')
                    ->placeholder('請選擇開始時間'),

                DateTimePicker::make('rent_end_date')
                    ->label('租借結束時間')
                    ->required()
                    ->native(false)
                    ->displayFormat('Y-m-d H:i')
                    ->placeholder('請選擇結束時間'),

                TextInput::make('total_amount')
                    ->label('總金額')
                    ->numeric()
                    ->required()
                    ->prefix('NT$')
                    ->placeholder('請輸入總金額'),

                Select::make('status')
                    ->label('訂單狀態')
                    ->options([
                        'pending' => '待確認',
                        'confirmed' => '已確認',
                        'rented' => '租借中',
                        'returned' => '已歸還',
                        'cancelled' => '已取消',
                        'completed' => '已完成',
                    ])
                    ->default('pending')
                    ->required()
                    ->placeholder('請選擇狀態'),

                Textarea::make('notes')
                    ->label('備註')
                    ->maxLength(500)
                    ->rows(3)
                    ->placeholder('請輸入備註'),
            ]);
    }
}
