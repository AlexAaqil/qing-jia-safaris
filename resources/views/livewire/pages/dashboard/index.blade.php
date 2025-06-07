<div class="Dashboard">
    <div class="container">
        <section class="stats">
            <div class="stat">
                <span>{{ $count_users }}</span>
                <span>{{ Str::plural('user', $count_users) }} and {{ $count_admins }} {{ Str::plural('admin', $count_admins) }}</span>
            </div>

            <div class="stat">
                <span>{{ $count_messages }}</span>
                <span>{{ Str::plural('message', $count_messages) }} and {{ $count_unread_messages }} unread</span>
            </div>
        </section>
    </div>
</div>
