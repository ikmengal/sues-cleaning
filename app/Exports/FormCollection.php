<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskDetail;
use App\Models\TaskPicture;
use App\Models\Facility;
use App\Models\FacilityRoom;
use Illuminate\Support\Collection;

class ExcelReportGenerator implements FromCollection
{
    public function collection()
    {
        // Retrieve data from multiple models and combine it into a single dataset
        $combinedData = collect();

        $tasks = Task::all();
        $users = User::all();
        $taskDetails = TaskDetail::all();
        $taskPictures = TaskPicture::all();
        $facilities = Facility::all();
        $facilityRooms = FacilityRoom::all();

        // Add data from each model to the combined dataset
        $combinedData = $combinedData->concat($tasks);
        $combinedData = $combinedData->concat($users);
        $combinedData = $combinedData->concat($taskDetails);
        $combinedData = $combinedData->concat($taskPictures);
        $combinedData = $combinedData->concat($facilities);
        $combinedData = $combinedData->concat($facilityRooms);

        return $combinedData;
    }
}