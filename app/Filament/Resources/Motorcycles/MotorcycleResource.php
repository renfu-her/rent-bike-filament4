<?php

namespace App\Filament\Resources\Motorcycles;

use App\Filament\Resources\Motorcycles\Pages\CreateMotorcycle;
use App\Filament\Resources\Motorcycles\Pages\EditMotorcycle;
use App\Filament\Resources\Motorcycles\Pages\ListMotorcycles;
use App\Filament\Resources\Motorcycles\Schemas\MotorcycleForm;
use App\Filament\Resources\Motorcycles\Tables\MotorcyclesTable;
use App\Models\Motorcycle;
use BackedEnum;
use Filament\Resources\Resource;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MotorcycleResource extends Resource
{
    protected static ?string $model = Motorcycle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = '機車管理';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return MotorcycleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MotorcyclesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMotorcycles::route('/'),
            'create' => CreateMotorcycle::route('/create'),
            'edit' => EditMotorcycle::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return '機車';
    }

    public static function getPluralModelLabel(): string
    {
        return '機車';
    }
}
