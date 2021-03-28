<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Model\Employee;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertCount;
use Controller\EmployeeController;
use Repository\EmployeeRepository;


class EmployeeContollerTest extends TestCase {

    /*public function test1() {

     // given
     //$employeeRepository = new EmployeeRepository();
     $stub = $this->createStub(EmployeeRepository::class);
     $stub->method('getAll')->willReturn(array(
         new Employee(1, "Jonas"),
         new Employee(2, "Petras")
        ));

     $employeeController = new EmployeeController($stub); 

    // when
     $res = $employeeController->getAllJson();

    // then ... turime pakeisti realiais duomenimis iš duomenų bazės!
    assertEquals('[{"id":1,"name":"Jonas"},{"id":2,"name":"Petras"}]', $res);

    }

    */

        // given
    public function testGetAllJsonReturnsJson() {
        $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
        $employeeController = new EmployeeController($mock);
        $mock->expects($this->exactly(1))
            ->method('getAll')
            ->willReturn(array(
                new Employee(1, "Jonas"), 
                new Employee(2, "Petras")
            ));
        
        // when
        $res = $employeeController->getAllJsonWithMetaInformation();
        // then
        assertEquals('[{"id":1,"name":"Jonas"},{"id":2,"name":"Petras"}]', $res);
        assertCount(2, ['Jonas', 'Petras']);
      

        
    }

}
