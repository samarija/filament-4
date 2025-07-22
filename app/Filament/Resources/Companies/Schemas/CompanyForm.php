<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\TextInput;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Group::make()
                    ->relationship(
                        'contact',
                        condition: fn (?array $state): bool => filled($state['name']),
                    )
                    ->schema([
                        TextInput::make('name')
                            ->label('Contact')
                    ])
            ]);
    }
}
