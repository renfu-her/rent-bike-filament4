<?php

namespace App\Filament\Resources\Members\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class MembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('姓名')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label('電子郵件')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('phone')
                    ->label('電話')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('id_number')
                    ->label('身份證字號')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('license_plate')
                    ->label('駕照號碼')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('orders_count')
                    ->label('訂單數量')
                    ->counts('orders')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('啟用狀態')
                    ->boolean()
                    ->trueIcon('heroicon-s-check-circle')
                    ->falseIcon('heroicon-s-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('created_at')
                    ->label('註冊時間')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('更新時間')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('啟用狀態')
                    ->placeholder('所有狀態')
                    ->trueLabel('已啟用')
                    ->falseLabel('已停用')
                    ->native(false),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
