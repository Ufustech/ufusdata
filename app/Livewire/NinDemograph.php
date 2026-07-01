<?php

namespace App\Livewire;

use App\Models\Demography;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class NinDemograph extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Search History')
            ->deferLoading()
            ->records(function (int $page, int $recordsPerPage): LengthAwarePaginator {
                $records = collect([
                    1 => [
                "id" => "SEARCH001",
                "surname" => "JOHNSON",
                "firstname" => "MARY",
                "middlename" => "ELIZABETH",
                "dob" => "15-08-1985",
                "date" => "2024-06-08",
                "status" => "Match Found"
            ],
            2=>[
                "id" => "SEARCH002",
                "surname" => "SMITH",
                "firstname" => "JOHN",
                "middlename" => "DAVID",
                "dob" => "22-03-1990",
                "date" => "2024-06-07",
                "status" => "Match Found"
            ]
                ])->forPage($page, $recordsPerPage);

                return new LengthAwarePaginator(
                    $records,
                    total: 3, // Total number of records across all pages
                    perPage: $recordsPerPage,
                    currentPage: $page,
                );
            })
            ->columns([
                TextColumn::make('id')->label('TRX ID'),
                TextColumn::make('name')
                    ->state(fn (array $record) => $record['firstname'] . ' ' . $record['middlename'] . ' ' . $record['surname']),

                TextColumn::make('dob')
                    ->date('F j, Y'),
                TextColumn::make('status')
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Processing' => 'info',
                        'Pending' => 'danger',
                        default => 'gray',
                    })
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->slideOver()
                    ->label('New Verification By Demograph')
                    ->modalHeading('Demographic Search System')
                    ->icon(Heroicon::User)
                    ->modalIcon(Heroicon::User)
                    ->requiresConfirmation()
                    ->createAnother(false)
                    ->modalSubmitActionLabel('Submit Request')
                    ->schema([
                        TextInput::make('surname')
                            ->placeholder('Enter surname')
                            ->required()
                            ->label('Surname'),

                        TextInput::make('fistName')
                            ->placeholder('Enter fist name')
                            ->required()
                            ->label('First Name'),

                        TextInput::make('middleName')
                            ->placeholder('Enter middle name(optional)')
                            ->label('Middle Name'),
                    ])
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.nin-demograph');
    }
}
