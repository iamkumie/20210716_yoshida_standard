<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->randomElement($array = ['1', '2']),
            'email' => $this->faker->email,
            'postcode' => $this->faker->postcode1 . "-" . $this->faker->postcode2,
            'address' => mb_substr($this->faker->address, 9),
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->realText(110),
        ];
    }
}
