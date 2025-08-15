<?php

namespace App\Filament\Resources\OrderDetails;

use App\Filament\Resources\OrderDetails\Pages\CreateOrderDetail;
use App\Filament\Resources\OrderDetails\Pages\EditOrderDetail;
use App\Filament\Resources\OrderDetails\Pages\ListOrderDetails;
use App\Filament\Resources\OrderDetails\Schemas\OrderDetailForm;
use App\Filament\Resources\OrderDetails\Tables\OrderDetailsTable;
use App\Models\OrderDetail;
use BackedEnum;
use Filament\Resources\Resource;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OrderDetailResource extends Resource
{
    protected static ?string $model = OrderDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'id';

    protected static string|UnitEnum|null $navigationGroup = '訂單管理';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return OrderDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrderDetailsTable::configure($table);
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
            'index' => ListOrderDetails::route('/'),
            'create' => CreateOrderDetail::route('/create'),
            'edit' => EditOrderDetail::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return '訂單明細';
    }

    public static function getPluralModelLabel(): string
    {
        return '訂單明細';
    }
}
