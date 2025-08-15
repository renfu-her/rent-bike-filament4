<?php

namespace App\Filament\Resources\MotorcycleAccessories\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MotorcycleAccessoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('model')
                    ->label('型號')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('quantity')
                    ->label('數量')
                    ->sortable()
                    ->alignCenter(),

                SelectColumn::make('status')
                    ->label('狀態')
                    ->options([
                        '待出租' => '待出租',
                        '出租中' => '出租中',
                        '停用' => '停用',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('建立時間')
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
                SelectFilter::make('status')
                    ->label('狀態')
                    ->options([
                        '待出租' => '待出租',
                        '出租中' => '出租中',
                        '停用' => '停用',
                    ])
                    ->placeholder('所有狀態'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
