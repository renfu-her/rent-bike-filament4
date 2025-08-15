<?php

namespace App\Filament\Resources\MotorcycleAccessories;

use App\Filament\Resources\MotorcycleAccessories\Pages\CreateMotorcycleAccessory;
use App\Filament\Resources\MotorcycleAccessories\Pages\EditMotorcycleAccessory;
use App\Filament\Resources\MotorcycleAccessories\Pages\ListMotorcycleAccessories;
use App\Filament\Resources\MotorcycleAccessories\Schemas\MotorcycleAccessoryForm;
use App\Filament\Resources\MotorcycleAccessories\Tables\MotorcycleAccessoriesTable;
use App\Models\MotorcycleAccessory;
use BackedEnum;
use Filament\Resources\Resource;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MotorcycleAccessoryResource extends Resource
{
    protected static ?string $model = MotorcycleAccessory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $recordTitleAttribute = 'model';

    protected static string|UnitEnum|null $navigationGroup = '網站管理';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return MotorcycleAccessoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MotorcycleAccessoriesTable::configure($table);
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
            'index' => ListMotorcycleAccessories::route('/'),
            'create' => CreateMotorcycleAccessory::route('/create'),
            'edit' => EditMotorcycleAccessory::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return '機車配件';
    }

    public static function getPluralModelLabel(): string
    {
        return '機車配件';
    }
}
