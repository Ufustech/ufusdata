<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ValidationHistory extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Validation History')
            ->deferLoading()
            ->records(function (int $page, int $recordsPerPage): LengthAwarePaginator {
                $records = collect([
                    1 => [
                        "id" => "TRX001",
                        "nin" => "12345678901",
                        "type" => "Normal/No Record Validation",
                        "status" => "Completed",
                        "reply" => "asgfsgs=ghfsshs",
                        "date" => "2024-06-08",
                        "time" => "14:30:25",
                    ],
                    2 =>[
                        "id" => "TRX002",
                        "nin" => "98765432109",
                        "type" => "VNIN/SIM/Bank Validation",
                        "status" => "Processing",
                        "reply" => "xvbnmk=qwertyui",
                        "date" => "2024-06-07",
                        "time" => "09:15:42",
                    ],
                    [
                        "id" => "TRX003",
                        "nin" => "45678912345",
                        "type" => "Modification Validation",
                        "status" => "Pending",
                        "reply" => "pending_review=validation_queue",
                        "date" => "2024-06-06",
                        "time" => "16:45:18",
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
                TextColumn::make('nin'),
                TextColumn::make('status')
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Processing' => 'info',
                        'Pending' => 'danger',
                        default => 'gray',
                    })
                    ->badge(),
                TextColumn::make('date')
                    ->date('F j, Y'),
                TextColumn::make('time')
                    ->time('g:i a'),
            ])
            ->headerActions([
               CreateAction::make()
                   ->slideOver()
                   ->label('New Validation Request')
                   ->modalHeading('NIN Validation System')
                   ->icon(Heroicon::DocumentText)
                   ->modalIcon(Heroicon::DocumentText)
                   ->requiresConfirmation()
                   ->createAnother(false)
                   ->modalSubmitActionLabel('Submit Request')
                   ->schema([
                       TextInput::make('nin')
                           ->placeholder('Enter or paste 11-digit NIN')
                           ->required()
                           ->numeric()
                           ->rule('digits:11')
                           ->label('National Identification Number (NIN)'),
                       Select::make('type')
                           ->label('Select validation type')
                           ->placeholder('Select validation type')
                           ->required()
                           ->searchable()
                           ->options([
                               'normal' => 'Normal/No Record Validation - N1000',
                               'modification' => 'Modification Validation - 1500',
                               'vnin' => 'VNIN/SIM/Bank Validation - 1500',
                               'photography_error' => 'Photography Error Validation - 1500',
                           ])
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
        return view('livewire.validation-history');
    }
}
