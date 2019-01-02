--Таблица employees содержит всех работников включая их менеджеров. Каждый работник имеет id и колонку для id менеджера manager_id.

+----+-------+--------+------------+
| id | name  | salary | manager_id |
+----+-------+--------+------------+
| 1  | Joe   | 70000  | 3          |
| 2  | Henry | 80000  | 4          |
| 3  | Sam   | 60000  | NULL       |
| 4  | Max   | 90000  | NULL       |
+----+-------+--------+------------+



    Напишите SQL запрос который найдет имена всех работников, которые получают больше чем их менеджеры.

SELECT employees_workers.name FROM employees AS employees_workers
  JOIN employees AS employees_manager ON 
  employees_workers.manager_id=employees_manager.id 
  WHERE employees_workers.salary>employees_manager.salary;
-- END
