<section>
    <header>
        <h2 class="h4">
            Profile Information
        </h2>

        <p class="mt-2 small text-muted">
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @if ($errors->get('name'))
                <div class="text-danger mt-1">
                    @foreach ($errors->get('name') as $message)
                        <span>{{ $message }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @if ($errors->get('email'))
                <div class="text-danger mt-1">
                    @foreach ($errors->get('email') as $message)
                        <span>{{ $message }}</span><br>
                    @endforeach
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-link p-0">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 small text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-start gap-4 w-min flex-column">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    {{-- x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)" --}}
                    class="text-muted small "
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
