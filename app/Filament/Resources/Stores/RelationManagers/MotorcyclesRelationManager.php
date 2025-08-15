<?php

namespace App\Filament\Resources\Stores\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Actions;

class MotorcyclesRelationManager extends RelationManager
{
    protected static string $relationship = 'motorcycles';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $title = '機車';
    protected static ?string $pluralModelLabel = '機車';
    protected static ?string $pluralLabel = '機車';
    protected static ?string $modelLabel = '機車';
    protected static ?string $label = '機車';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('機車名稱')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('model')
                    ->label('型號')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('license_plate')
                    ->label('車牌號碼')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('price')
                    ->label('價格')
                    ->money('TWD')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('狀態')
                    ->colors([
                        'success' => 'available',
                        'warning' => 'rented',
                        'danger' => 'maintenance',
                        'info' => 'pending_checkout',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'available' => '可出租',
                        'rented' => '已出租',
                        'maintenance' => '維修中',
                        'pending_checkout' => '待結帳',
                        default => $state,
                    }),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->label('新增機車'),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->label('編輯'),
                Actions\DeleteAction::make()
                    ->label('刪除'),
            ])
            ->defaultSort('name', 'asc');
    }
}
