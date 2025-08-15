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

                TextColumn::make('id_number')
                    ->label('身份證字號')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                TextColumn::make('phone')
                    ->label('電話')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('address')
                    ->label('地址')
                    ->searchable()
                    ->limit(50),
            ])
            ->defaultSort('name', 'asc');
    }
}
