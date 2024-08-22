<?php

namespace App\Filament\Pages;

use App\Models\SupportRequest;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Notifications\Notification;


class Support extends Page implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static string $view = 'filament.pages.support';

    public $name;
    public $email;
    public $subject;
    public $details;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->required()
                ->email(),
            Forms\Components\TextInput::make('subject')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('details')
                ->required(),
        ];
    }

    public function submit(): void
    {
        // Validate and save the support request
        SupportRequest::create($this->form->getState());

        // Show confirmation notification
        Notification::make()
            ->title('Support request sent successfully!')
            ->success()
            ->send();

        // Reset the form
        $this->form->fill([]);
    }
    
}
