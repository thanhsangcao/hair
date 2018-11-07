<?php
namespace App\Repositories\Contracts;

interface BookingRepositoryInterface
{
    public function all();
    public function find($id);
    public function destroy($id);
    public function getSelectedServices($id);
    public function getStylistBySalon($id);
    public function changeStatus($booking, $status_id);
}
