<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('CompanyName')
                    ->required(),
                Section::make()
                    ->relationship(
                        'contact',
                        condition: fn (?array $state): bool => filled($state['name']),
                    )
                    ->description('should be deleted if ContactName is empty.')
                    ->schema([
                        TextInput::make('name')
                            ->label('ContactName')
                    ])
                    ->columnSpanFull()
            ]);
    }
}
