use Company;
Create Table Wives 
(
Id int Primary key Identity(1,1),
Name varchar(100) Not Null ,
NationalId decimal Not Null ,
BirthDate Date Not Null ,
EmployeeId int Not Null ,
CONSTRAINT FK_Wives_Employee FOREIGN KEY (EmployeeId)
        REFERENCES Employees(Id)
        ON DELETE CASCADE 
);
Create Table Children (
Id int primary key identity (1,1) ,
Name varchar (50)Not Null ,
NationalId varchar (25) Not Null , 
BirthDate Date Not Null , 
employeeId int Not Null ,
WifeId int  Null 
    CONSTRAINT FK_Children_Employee FOREIGN KEY (EmployeeId)
        REFERENCES Employees(Id) ON DELETE CASCADE,

    CONSTRAINT FK_Children_Wife FOREIGN KEY (WifeId)
        REFERENCES Wives(Id) ON DELETE NO ACTION
);

Select * From Wives;
Select * From Children;
INSERT INTO Wives (Name, NationalId, BirthDate, EmployeeId)
VALUES 
('Amina Ali', '12345678901234', '1985-06-01', 1),
('Salma Hassan', '23456789012345', '1988-09-15', 2);
INSERT INTO Children (Name, NationalId, BirthDate, employeeId, WifeId)
VALUES 
('Youssef Ali', '34567890123456', '2010-03-12', 1, 1),
('Laila Ali', '45678901234567', '2012-07-19', 1, 1),
('Omar Hassan', '56789012345678', '2015-11-25', 2, 2);

ALTER TABLE Children NOCHECK CONSTRAINT ALL;
ALTER TABLE Wives NOCHECK CONSTRAINT ALL;
DELETE FROM Children;
DELETE FROM Wives;
ALTER TABLE Children CHECK CONSTRAINT ALL;
ALTER TABLE Wives CHECK CONSTRAINT ALL;
DBCC CHECKIDENT ('Children', RESEED, 0);
DBCC CHECKIDENT ('Wives', RESEED, 0);