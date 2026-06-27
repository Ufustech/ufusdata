<?php

namespace App\Filament\Pages\Auth;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
class EditProfile extends \Filament\Auth\Pages\EditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        ImageEntry::make('image')
                            ->hiddenLabel()
                            ->alignCenter()
                            ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&background=random&color=fff&bold=true&size=128')
                            ->circular(),
                        TextEntry::make('name')
                            ->hiddenLabel()
                            ->alignCenter(),
                        TextEntry::make('email')
                            ->hiddenLabel()
                            ->alignCenter()
                            ->label('Email address'),
                    ]),
                Section::make('Accounts Details')
                    ->columnSpan(2)
                    ->schema([
                        TextEntry::make('name')
                            ->hiddenLabel()
                            ->alignCenter(),

                        TextEntry::make('phone_number')
                            ->default('080861559532')
                            ->hiddenLabel()
                            ->alignCenter(),
                        TextEntry::make('email')
                            ->hiddenLabel()
                            ->alignCenter()
                            ->label('Email address'),
                        TextEntry::make('created_at')
                            ->hiddenLabel()
                            ->alignCenter()
                            ->dateTime('F j, Y g:i A')
                            ->placeholder('-'),
                    ]),
            ])->columns(3);
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
