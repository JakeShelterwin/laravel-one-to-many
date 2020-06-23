<?php

namespace App\Http\Controllers;

use App\Task;
use App\Employee;
use App\Location;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function showEmployee($id){
      $employee = Employee::findOrFail($id);
      $locations = Location::all();
      return view('showEmployee', compact("employee", "locations"));
    }

    // modifica employee
    public function editEmployee($id){
      $employee = Employee::findOrFail($id);
      $locations = Location::all();
      return view('editEmployee', compact("employee", "locations"));
    }

    public function update(Request $request, $id){

      $validateData = $request -> validate([
        "firstName" => "required|max:100",
        "lastName" => "required|max:100",
        "DateOfBirth" => "required|date",
        "locations" => "required",
      ]);

      // Task::whereId($id) -> update($validateData);
      $task = Employee::findOrFail($id);
      $task -> firstName = $validateData["firstName"];
      $task -> lastName = $validateData["lastName"];
      $task -> DateOfBirth = $validateData["DateOfBirth"];
      $task -> save();

      $task -> locations() -> sync($validateData["locations"]);

      return redirect() -> route("showEmployee", $id)
                        -> withSuccess("Employee ".$validateData["firstName"]. $validateData["lastName"]
                            ." correttamente aggiornato");
    }

    public function destroy($id){
      $task = Employee::findOrFail($id);
      $task -> delete();
      return redirect() -> route("home")
                        -> withSuccess("Employee correttamente licenziato");
    }

    // aggiungi task
    public function create(){
      $employees = Employee::all();
      $locations = Location::all();
      return view('createEmployee', compact("employees", "locations"));
    }

    public function store(Request $request){
      $validateData = $request -> validate([
        "firstName" => "required|max:100",
        "lastName" => "required|max:100",
        "DateOfBirth" => "required|date",
        "role" => "required",
        "locations" => "required|array"
      ]);

      $task = new Employee;

      $task -> firstName = $validateData["firstName"];
      $task -> lastName = $validateData["lastName"];
      $task -> DateOfBirth = $validateData["DateOfBirth"];
      $task -> role = $validateData["role"];
      $task -> save();

      $task -> locations() -> sync($validateData["locations"]);

      return redirect() -> route("home")
                        -> withSuccess("Employee correttamente assunto");;
    }
}
