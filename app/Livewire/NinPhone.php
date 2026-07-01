<?php

namespace App\Livewire;

use App\Models\NinePhoned;
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

class NinPhone extends Component implements HasActions, HasSchemas, HasTable
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
                        "id" => "TRX001",
                        "nin" => "12345678901",
                        "status" => "Completed",
                        "date" => "2024-06-08",
                    ],
                    2 =>[
                        "id" => "TRX002",
                        "nin" => "98765432109",
                        "status" => "Processing",
                        "date" => "2024-06-07",
                    ],
                    [
                        "id" => "TRX003",
                        "nin" => "45678912345",
                        "status" => "Pending",
                        "date" => "2024-06-06",
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->slideOver()
                    ->label('New Verification By Phone')
                    ->modalHeading('Phone to NIN Search System')
                    ->icon(Heroicon::Phone)
                    ->modalIcon(Heroicon::Phone)
                    ->requiresConfirmation()
                    ->createAnother(false)
                    ->modalSubmitActionLabel('Submit Request')
                    ->schema([
                        TextInput::make('phone')
                            ->placeholder('Enter phone number (e.g., 08012345678')
                            ->required()
                            ->numeric()
                            ->rule('digits:11')
                            ->label('Phone Number'),
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
        return view('livewire.nin-phone');
    }
}
