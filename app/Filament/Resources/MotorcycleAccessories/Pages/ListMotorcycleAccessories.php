<?php

namespace App\Filament\Resources\MotorcycleAccessories\Pages;

use App\Filament\Resources\MotorcycleAccessories\MotorcycleAccessoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotorcycleAccessories extends ListRecords
{
    protected static string $resource = MotorcycleAccessoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('新增機車配件'),
        ];
    }
}
