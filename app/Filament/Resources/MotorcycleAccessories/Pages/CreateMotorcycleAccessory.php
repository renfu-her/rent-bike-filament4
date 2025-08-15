<?php

namespace App\Filament\Resources\MotorcycleAccessories\Pages;

use App\Filament\Resources\MotorcycleAccessories\MotorcycleAccessoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMotorcycleAccessory extends CreateRecord
{
    protected static string $resource = MotorcycleAccessoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return '機車配件已成功建立';
    }
}
