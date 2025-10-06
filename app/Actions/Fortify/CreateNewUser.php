<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Fingerprint\ServerAPI\Api\FingerprintApi;
use Fingerprint\ServerAPI\Configuration;
use GuzzleHttp\Client;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();


$config = Configuration::getDefaultConfiguration(
  config('services.fingerprint.api_key'),
  Configuration::REGION_GLOBAL // Replace with your region
);

//new

$client = new FingerprintApi(
  new Client(),
  $config
);

// Get a specific identification event
try {
  list($model, $response) = $client->getEvent($input['fingerprint_request_id']);
  echo "Status: " . $response_upd->getStatusCode();
  echo "<pre>" . $model . "</pre>";
} catch (Exception $e) {
  echo $e->getMessage(), PHP_EOL;
}
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
