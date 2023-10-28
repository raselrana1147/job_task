<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currentDate = Carbon::now();

        $new_current_date = $currentDate->copy()->addDays(30);
        $daysToAdd = $this->faker->numberBetween(31, 90);
        $new_future_date = $currentDate->copy()->addDays($daysToAdd);


        return [
            'valuteID'=>'R0'.$this->faker->numberBetween(100,500),
            'numCode'=>$this->faker->unique()->numerify("###"),
            'charCode'=>$this->faker->currencyCode(),
            'name'=>$this->faker->randomElement($this->currencyName()),
            'value'=>$this->faker->randomFloat(4,10,1000),
            'date' => $this->faker->dateTimeBetween($new_current_date, $new_future_date)->format('Y-m-d'),

        ];
    }

    private function currencyName(){

            return [
                'US Dollar',
                'Euro',
                'British Pound',
                'Japanese Yen',
                'Canadian Dollar',
                'Swiss Franc',
                'Australian Dollar',
                'Chinese Yuan',
                'Indian Rupee',
                'South Korean Won',
                'Brazilian Real',
                'Mexican Peso',
                'South African Rand',
                'Russian Ruble',
                'New Zealand Dollar',
                'Singapore Dollar',
                'Swedish Krona',
                'Norwegian Krone',
                'Danish Krone',
                'Hong Kong Dollar',
                'Saudi Riyal',
                'Emirati Dirham',
                'Turkish Lira',
                'Argentine Peso',
                'Chilean Peso',
                'Egyptian Pound',
                'Israeli New Shekel',
                'Singapore Dollar',
                'Malaysian Ringgit',
                'Indonesian Rupiah',
                'Thai Baht',
            ];


    }
}
