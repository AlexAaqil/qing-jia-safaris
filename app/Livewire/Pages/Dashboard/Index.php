<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use App\Models\ContactMessage;
use App\Models\User;

class Index extends Component
{
    public function render()
    {
        $count_users = User::where('role', '>=', '3')->count();
        $count_admins = User::where('role', '<', '3')->count();

        $count_messages = ContactMessage::count();
        $count_unread_messages = ContactMessage::where('is_read', false)->count();

        return view('livewire.pages.dashboard.index', compact(
            'count_admins',
            'count_users',

            'count_messages',
            'count_unread_messages',
        ));
    }
}
