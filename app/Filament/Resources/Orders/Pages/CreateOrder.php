<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return '訂單已成功建立';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['order_no'] = \App\Models\Order::generateOrderNo();
        return $data;
    }
}
