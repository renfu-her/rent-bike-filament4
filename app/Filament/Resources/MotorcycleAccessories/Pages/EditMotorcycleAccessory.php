<?php

namespace App\Filament\Resources\MotorcycleAccessories\Pages;

use App\Filament\Resources\MotorcycleAccessories\MotorcycleAccessoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMotorcycleAccessory extends EditRecord
{
    protected static string $resource = MotorcycleAccessoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('刪除機車配件'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return '機車配件已成功更新';
    }
}
