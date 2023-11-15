<?php

namespace App\Filament\Appraiser\Resources\CurrentPerformanceResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class CurrentPerformanceWidget extends Widget
{
    protected static string $view = 'filament.appraiser.resources.current-performance-resource.widgets.current-performance-widget';

    public ?model $record = null;
    public $sum = 0;
    public $average = 0;
    public $rating = '';

    public function mount()
    {
        if (!$this->record) {
            $this->CalculateAverage();
        }
    }

    protected $listeners = ['RatingUpdated',];

    public function CalculateAverage(){
        if (!$this->record) {
            return;
        }
        else {

            // Calculate the sum and average
            $numericColumns = ['quality_of_work', 'job_knowledge', 'initiative_resourcefulness', 'attendance_dependability', 'attitude_toward_work'];

            foreach ($numericColumns as $column) {
                $this->sum += $this->record->sum($column);
            }

            $this->average = $this->sum / count($numericColumns);

            // Determine the rating based on the average
            $this->rating = $this->getRating($this->average);

            $this->RatingUpdated();
        }


    }
    //store the average rating in the database
    public function RatingUpdated(): void
    {
        $this->record->result->current_performance = $this->average;
        $this->record->save();
    }

    private function getRating($average): string
    {
        if ($average >= 1 && $average <= 1.5) {
            return 'Unsatisfactory';
        } elseif ($average >= 1.6 && $average <= 2.5) {
            return 'Marginal';
        } elseif ($average >= 2.6 && $average <= 3.5) {
            return 'Good';
        } elseif ($average >= 3.6 && $average <= 4.5) {
            return 'Very Good';
        } elseif ($average >= 4.6 && $average <= 5) {
            return 'Excellent';
        }
        return '';
    }
}
