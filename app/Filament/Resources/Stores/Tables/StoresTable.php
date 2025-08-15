<?php

namespace App\Filament\Resources\Stores\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class StoresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('商店名稱')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('phone')
                    ->label('電話')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('address')
                    ->label('地址')
                    ->searchable()
                    ->limit(50),

                BadgeColumn::make('status')
                    ->label('狀態')
                    ->colors([
                        'success' => 1,
                        'danger' => 0,
                    ])
                    ->formatStateUsing(fn (int $state): string => $state === 1 ? '啟用' : '停用'),
            ])
            ->defaultSort('name', 'asc');
    }
}
