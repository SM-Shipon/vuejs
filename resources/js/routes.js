/**
 * Created by SHIPON on 9/24/2019.
 */
/* jshint node: true */
/*jshint esversion: 6 */
import Dashboard from './components/Dashboard.vue';
import Student from './components/student/Student.vue';
import Employee from './components/employee/Employee.vue';
import City from './components/City.vue';
import PointOfSale from './components/PointOfSale.vue';
import PointOfSale2 from './components/PointOfSale2.vue';

export const routes = [
    {
        path: '/',
        component: Dashboard
    },

    {
        path: '/student',
        component: Student
    },

    {
        path: '/employee',
        component: Employee
    },
    {
        path: '/city',
        component: City
    },

    {
        path: '/point-of-sale',
        component: PointOfSale
    },
    {
        path: '/point-of-sale2',
        component: PointOfSale2
    },
];