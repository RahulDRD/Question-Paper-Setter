-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 10:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit`
--

-- --------------------------------------------------------

--
-- Table structure for table `mba`
--

CREATE TABLE `mba` (
  `sno` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `unit` int(20) NOT NULL,
  `question` mediumtext NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mca`
--

CREATE TABLE `mca` (
  `sno` int(11) NOT NULL,
  `semester` int(10) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `unit` int(10) NOT NULL,
  `question` text NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mca`
--

INSERT INTO `mca` (`sno`, `semester`, `subject`, `unit`, `question`, `marks`) VALUES
(20, 2, 'Programming with Java(261201CA', 1, 'What is Interface? Write the difference between Interface and Abstract class.', 8),
(21, 2, 'Programming with Java(261201CA', 2, 'Explain try, catch, finally, throw, throws.', 4),
(22, 2, 'Programming with Java(261201CA', 2, 'What is Exception in java ? Write a code to create our own exception class.', 8),
(23, 2, 'Programming with Java(261201CA', 2, 'Discuss synchronization with suitable example program.', 8),
(24, 2, 'Programming with Java(261201CA', 2, 'How to create multiple threads in java with suitable example code.', 8),
(25, 2, 'Programming with Java(261201CA', 3, 'Discuss Stream classes in Java.sss', 4),
(26, 2, 'Programming with Java(261201CA', 3, 'Discuss TCP/IP socket with suitable example program.', 8),
(27, 2, 'Programming with Java(261201CA', 3, 'Write a program to send two data fields USERID and PASSWORD to RMI Server and save it to the Database.', 8),
(28, 2, 'Programming with Java(261201CA', 3, 'What is Serialization and Deserialization in Java ? Write suitable example code.', 8),
(29, 2, 'Programming with Java(261201CA', 4, 'Explain Delegation Event Model.', 4),
(30, 2, 'Programming with Java(261201CA', 4, 'Create Internal frame on the DesktopPane with three fields E-ID, Name, Department and SALARY and save these in to MS-ACCESS/ORACLE/ or MYSQL database.', 8),
(31, 2, 'Programming with Java(261201CA', 4, 'Discuss JTable, JCheckBox, JTextArea, JList, JTabbedPane, JScrollPane  with three constructor listner Interface and Event Class.', 8),
(32, 2, 'Programming with Java(261201CA', 4, 'What are JDBC and their driver? What are the steps to connect to the database.', 8),
(33, 2, 'Programming with Java(261201CA', 5, 'Make the applet life cycle with suitable diagram.', 4),
(34, 2, 'Programming with Java(261201CA', 5, 'Explain Servlet life cycle with example program.', 8),
(35, 2, 'Programming with Java(261201CA', 5, 'Design an applet which accepts username as a parameter for HTML page and display number of characters from.', 8),
(36, 2, 'Programming with Java(261201CA', 5, 'Write a program to submit datafield ID, NAME, SALARY and DEPT from client to the databse through server side coding Servlet and Tomcat Server.', 8),
(61, 2, 'Operating System (261204CA)', 1, 'What is the use of file in operating system? Write the different types of files. Explain the different file accessing methods. ', 8),
(66, 2, 'Operating System (261204CA)', 2, 'What is Paging? Explain it with a suitable example. How it is different from Segmentation.', 8),
(67, 2, 'Operating System (261204CA)', 2, 'What do you understand by Virtual memory? Why it is used? Explain the different page replacement algorithms with example', 8),
(68, 2, 'Operating System (261204CA)', 1, 'Explain the operating system with neat and clean diagram. Write the major tasks performed by the operating system.', 4),
(69, 2, 'Operating System (261204CA)', 1, 'Explain in brief the different services provided by the operating system.', 8),
(71, 2, 'Operating System (261204CA)', 1, 'Explain the different allocation strategies of files. Write advantages of each method.', 8),
(74, 2, 'Operating System (261204CA)', 2, 'Write the main purpose of CPU scheduling. Write the names of different CPU scheduling algorithm.', 8),
(97, 1, 'Advance Computer Network(261103CA)', 1, 'Why is layered architecture of network preferred?', 4),
(98, 1, 'Advance Computer Network(261103CA)', 1, 'Explain the Pulse Code Modulation with an example.', 8),
(99, 1, 'Advance Computer Network(261103CA)', 1, 'What is the use of transmission media? Explain the different types of transmission media in brief with a neat and clean diagram.	', 8),
(100, 1, 'Advance Computer Network(261103CA)', 1, 'What do you understand by error detection and error correction? Explain CRC method for error detection with an example.', 8),
(101, 1, 'Advance Computer Network(261103CA)', 2, 'What are the responsibilities of Data Link layer?', 4),
(102, 1, 'Advance Computer Network(261103CA)', 2, 'How to explain that Bridges isolate the network from other network? Explain with an example.', 8),
(103, 1, 'Advance Computer Network(261103CA)', 2, 'In classful addressing, how is an IP address in class A, Class B and Class C divided? Explain with an example.', 8),
(104, 1, 'Advance Computer Network(261103CA)', 2, 'Explain the Dijkstra Routing algorithm with an example.', 8),
(105, 1, 'Advance Computer Network(261103CA)', 1, 'What is computer network? Write the different components of computer network.', 4),
(106, 1, 'Advance Computer Network(261103CA)', 1, 'Explain the Time Division Multiplexing with an example.', 8),
(107, 1, 'Advance Computer Network(261103CA)', 1, 'What is OSI Reference model? Explain the different layers of this model.', 8),
(111, 1, 'Advance Computer Network(261103CA)', 2, 'What do you understand by traffic shaping? Explain token bucket algorithm with an example.', 8),
(112, 1, 'Advance Computer Network(261103CA)', 2, 'Write short notes:\n(i)	Gateway\n(ii)	Virtual Circuit\n', 8),
(113, 2, 'Operating System (261204CA)', 1, 'Write at least five functions of operating system?', 4),
(115, 2, 'Operating System (261204CA)', 1, 'What is Batch operating system? How it is work? Write the Advantage and Disadvantages of Batch operating system.', 8),
(116, 2, 'Operating System (261204CA)', 1, 'Write short notes:\n(i)	Distributed Operating System\n(ii)	Network Operating System	\n', 8),
(117, 2, 'Operating System (261204CA)', 2, 'What is the use of CPU Scheduling? Write the names of the CPU Scheduling? How the preemptive scheduling is different from non-preemptive scheduling?', 4),
(123, 2, 'Operating System (261204CA)', 1, 'Define three properties of each of the following types of operating system:\n(i)	Time Sharing System\n(ii)	Real Time\n(iii)	Batch System\n', 8),
(125, 2, 'Operating System (261204CA)', 2, 'Define the difference between Preemptive and Non-Preemptive scheduling.', 4),
(126, 2, 'Operating System (261204CA)', 2, 'What is the importance of memory management? Explain the multiprogramming technique for variable partition with an example.', 8),
(129, 1, 'Advance Computer Network(261103CA)', 3, 'Write the differences between connection oriented and connectionless services with suitable example.', 4),
(130, 1, 'Advance Computer Network(261103CA)', 3, 'Which protocol is mainly used for transferring the files from one machine to another machine on the network? Explain the working of that protocol. ', 8),
(131, 1, 'Advance Computer Network(261103CA)', 3, 'Write short notes (any two):\n(a)	POP3\n(b)	HTTP\n(c)	SNMP	\n', 8),
(132, 1, 'Advance Computer Network(261103CA)', 3, 'What is the purpose of TCP/IP reference model? Write the different functions of each layers.', 8),
(133, 1, 'Advance Computer Network(261103CA)', 4, 'What is the purpose of Server? How the web-client is communicated with web-server. Explain with suitable diagram.', 4),
(134, 1, 'Advance Computer Network(261103CA)', 4, 'Write the different steps for website development process. Explain in brief all the steps.', 8),
(135, 1, 'Advance Computer Network(261103CA)', 4, 'How the web publishing tools are useful for website designing? Explain WordPress as a web development tool with some advantages and disadvantages.', 8),
(136, 1, 'Advance Computer Network(261103CA)', 4, 'Why need web hosting? Write and explain the different types of Web Hosting process.', 8),
(137, 1, 'Advance Computer Network(261103CA)', 5, 'Explain in brief the different types of internet security threats.', 4),
(138, 1, 'Advance Computer Network(261103CA)', 5, 'Write the full form of AAA? Explain in brief all the A terms.', 4),
(139, 1, 'Advance Computer Network(261103CA)', 5, 'Write the full form of AAA? Explain in brief all the A terms.', 8),
(140, 1, 'Advance Computer Network(261103CA)', 5, 'Write short notes:\n(a)	Deep net\n(b)	E-Commerce\n', 8),
(141, 1, 'Advance Computer Network(261103CA)', 5, 'Write short notes \n(a)	Dark net\n(b)	Firewall\n', 8),
(142, 1, 'Advance Computer Network(261103CA)', 3, 'Write the differences between TCP and UDP protocols.', 4),
(143, 1, 'Advance Computer Network(261103CA)', 3, 'What do you understand by ISP? Explain in brief the different types of ISP.', 8),
(144, 1, 'Advance Computer Network(261103CA)', 3, 'Write short notes (any two):\n(a)	POP3\n(b)	DHCP\n(c)	ICMP	\n', 8),
(145, 1, 'Advance Computer Network(261103CA)', 3, 'What is the use of SMTP protocol? Explain the working of SMTP protocol with diagram.', 8),
(146, 1, 'Advance Computer Network(261103CA)', 4, 'What is Website? Write at least five server side scripting language for website development. ', 4),
(147, 1, 'Advance Computer Network(261103CA)', 4, 'Write the different steps for website development process. Explain in brief all the steps.', 8),
(148, 1, 'Advance Computer Network(261103CA)', 4, 'What do you understand by registration of website on search engine and website indexing?', 8),
(149, 1, 'Advance Computer Network(261103CA)', 4, 'Write short notes:\n(a)	Web Publishing Tools\n(b)	Web Client & Server\n', 8),
(150, 1, 'Advance Computer Network(261103CA)', 5, 'What is AAA? Explain in brief.', 4),
(151, 1, 'Advance Computer Network(261103CA)', 5, 'What is Electronic Payment System (EPS)? Explain the different types of EPS in brief.', 8),
(152, 1, 'Advance Computer Network(261103CA)', 5, 'What is electronic data interchange (EDI)? Explain the working process of EDI.', 8),
(153, 1, 'Advance Computer Network(261103CA)', 5, 'Write short notes \n(a)	Dark net\n(b)	Firewall	\n', 8),
(154, 2, 'Operating System (261204CA)', 3, 'What is the use of Precedence graph?', 4),
(155, 2, 'Operating System (261204CA)', 3, 'What is Deadlock? Explain the necessary conditions for deadlock.', 8),
(156, 2, 'Operating System (261204CA)', 3, 'What is semaphore? Explain in detail. Differentiate between counting and binary semaphore. ', 8),
(157, 2, 'Operating System (261204CA)', 4, 'What is Unix operating system? Write the benefits of Unix.', 4),
(158, 2, 'Operating System (261204CA)', 4, 'Explain the architecture of Unix operating system.', 8),
(159, 2, 'Operating System (261204CA)', 4, 'Explain the following commands with Syntax and Example:\n(i) ls    (ii) cp   (iii) wc   (iv) grep\n', 8),
(160, 2, 'Operating System (261204CA)', 4, 'What are the filters and what is the use of it? Which filters will be used to perform following operations:\n(i)	Exact first four line of a file\n(ii)	Exact last four line of a file\n(iii)	To change the text of a file into a uppercase\n', 8),
(161, 2, 'Operating System (261204CA)', 5, 'What is system calls? Why it is used?', 4),
(162, 2, 'Operating System (261204CA)', 5, '(i) Write a shell script to print greater number between two number input through the keyboard.\n(ii) Write a shell script to print the sum of all the numbers between 1 to 50.\n', 8),
(163, 2, 'Operating System (261204CA)', 5, 'What are shell variables? Explain any five in-built shell variables. Write a shell script to perform five basic arithmetic operations of two number and display their results.', 8),
(164, 2, 'Operating System (261204CA)', 5, 'Write short notes:\n(i)	fork() system call\n(ii)	exit() system call	\n', 8),
(167, 2, 'Operating System (261204CA)', 4, 'Explain the hierarchical file structure of UNIX operating system.', 8),
(168, 2, 'Operating System (261204CA)', 4, 'Explain the various features and benefits of UNIX operating system', 8),
(169, 2, 'Operating System (261204CA)', 4, 'Describe the structure of Unix file system. Explain the Boot-block, Super-block, Inode-block, and Data-block. Also explain the role of inode in accessing the contents of the file’s data.', 8),
(170, 2, 'Operating System (261204CA)', 5, 'Explain the use the Open( ), Read( ), and Write( ) system call.', 8),
(171, 2, 'Operating System (261204CA)', 5, 'Write a shell script to calculate the gross salary of an employee whose DA is taken as 40% and HRA, 10% of the Basic salary. Basic salary is accepted from the user. ', 8),
(172, 1, 'Advance Computer Network(261103CA)', 1, 'Define Computer Network. Write any three applications. Also, write the necessary components of it.', 4),
(173, 1, 'Advance Computer Network(261103CA)', 1, 'Write the main purpose of multiplexing. Explain the Time Division Multiplexing with an example and a suitable diagram.', 8),
(174, 1, 'Advance Computer Network(261103CA)', 1, 'What do you understand by wired media? How it is different from wireless media? Explain the Coaxial cable with a neat and clean diagram.', 8),
(175, 1, 'Advance Computer Network(261103CA)', 1, 'Explain the CRC method for error detection with an example. How the Hamming code is better than the CRC. Justify it with a suitable example.', 8),
(176, 1, 'Advance Computer Network(261103CA)', 2, 'Write the main jobs of the Data Link layer.', 4),
(177, 1, 'Advance Computer Network(261103CA)', 2, 'Write the main purpose of the flow control process in the data link layer. Explain the Sliding Window flow control with a time diagram.', 8),
(178, 1, 'Advance Computer Network(261103CA)', 2, 'Write the different features of the Bridge device. Explain the Isolation, Filtering, and Translation process of the Bridge with an example.', 8),
(179, 1, 'Advance Computer Network(261103CA)', 2, 'What do you understand by the Token passing approach? Describe the Token Bus with a suitable diagram. Write and explain the different steps for sending data from one node to another node with an example.', 8),
(180, 2, 'Programming with Java(261201CA)', 1, 'Explain the following terms of Object Oriented Programming with an example\na.	Data Abstraction\nb.	Class\nc.	Object\nd.	Encapsulation\ne.	Inheritance\nf.	Polymorphism \n', 8),
(181, 2, 'Programming with Java(261201CA)', 1, 'Justify with a suitable example that JAVA is a platform-independent language.', 4),
(182, 2, 'Programming with Java(261201CA)', 1, 'Justify your answer with an example code that JAVA String class objects are immutable.', 4),
(183, 2, 'Programming with Java(261201CA)', 1, 'How the method overloading is different from method overriding? Justify your answer with an example.', 4),
(184, 2, 'Programming with Java(261201CA)', 1, 'Why do the public variables violate the principle of encapsulation in the oops concept? Justify your answer with some example code.', 4),
(185, 2, 'Programming with Java(261201CA)', 2, 'Describe the significance of protected modifiers in inheritance with an example code.', 4),
(186, 2, 'Programming with Java(261201CA)', 1, 'How the private modifier is different from the protected modifier? Give some examples to justify your answer.', 4),
(187, 2, 'Programming with Java(261201CA)', 1, 'Write short notes: (1) final (2) package', 4),
(188, 2, 'Programming with Java(261201CA)', 1, 'Write short notes: (1) classpath (2) StringBuffer', 4),
(189, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to input the radius of a circle and print the Area and Perimeter of a circle.', 4),
(190, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to input three numbers from the keyboard and print the greatest number.', 4),
(191, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to print the sum of all the numbers between 200 to 700, which are divisible by 3 and 5.', 4),
(192, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to print the sum of the digits of a number.', 4),
(193, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to count the number of words in the given string.', 4),
(194, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to create a simple class named Rectangle and print the Area and Perimeter of that rectangle.', 4),
(195, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to create a simple class to calculate the factorial of a given number by using the constructor to initialize the object of that class.', 4),
(196, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to implement default and parameterized constructors.', 4),
(197, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to implement constructor overloading.', 4),
(198, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to implement single-level inheritance.', 4),
(199, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to implement multilevel inheritance.', 4),
(200, 2, 'Programming with Java(261201CA)', 1, 'Write a java code to demonstrate the calling of parameterized constructors of parent class in single-level and multi-level inheritance using the super keyword.', 4),
(202, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to demonstrate the method overloading concept.', 8),
(203, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to demonstrate the method overriding concept.', 8),
(204, 2, 'Programming with Java(261201CA)', 1, 'Write a JAVA program to demonstrate the Dynamic Method Dispatching or Run Time Polymorphism.', 8),
(205, 2, 'Programming with Java(261201CA)', 2, 'Write a program to demonstrate the caught exception of Division by Zero using a try-catch block.', 4),
(206, 2, 'Programming with Java(261201CA)', 2, 'Write a program to demonstrate caught exception of Array Index Out of Range using a try-catch block.', 4),
(207, 2, 'Programming with Java(261201CA)', 2, 'Write a program to demonstrate throw and throws using a suitable example code.', 8),
(208, 2, 'Programming with Java(261201CA)', 2, 'Write a program to demonstrate user define exception class by using a suitable example code.', 8),
(209, 2, 'Programming with Java(261201CA)', 2, 'Write a program to demonstrate the user-defined exception class by using a suitable example code.', 8),
(210, 2, 'Programming with Java(261201CA)', 2, 'Write a Java program to create a method that takes an integer as a parameter and throws an exception if the number is odd.', 8),
(211, 2, 'Programming with Java(261201CA)', 2, 'Write a program that creates a Calculator class. The class contains two variables of integer type. \na.	Design a constructor that accepts two values as parameters and sets those values. Design four methods named add (), subtract(), multiply(), and division() for performing addition, subtraction, multiplication, and division of two numbers. \nb.	For addition and subtraction, two numbers should be positive. If any negative number is entered then throw an exception in the respective methods. So design an exception handler (ArithmeticException) in add() and subtract() methods respectively to check whether any number is negative or not. \nc.	For division and multiplication two numbers should not be zero. If zero is entered for any number then throw an exception in respective methods. So design an exception handler (ArithmeticException) in multiply() and division() methods respectively to check whether any number is zero or not.\n', 8),
(212, 2, 'Programming with Java(261201CA)', 2, 'Create an exception class named  MyException that extends a base class named Exception. \na.	Design a constructor in your class that accepts a string value and set it to the super class constructor to display the exception message.\nb.	Create a main class named product. Write a method inside the class called productCheck(int weight) that accepts the weight of the product. Inside the method, if the weight is less than 100 then throw an exception â€œProduct is invalidâ€ otherwise print the weight of the product.\nc.	Inside the main method declare single object of the product class and call the productCheck() method to display the weight of the product.\n', 8),
(214, 2, 'Programming with Java(261201CA)', 1, 'Write any ten features of java.', 4),
(215, 2, 'Programming with Java(261201CA)', 1, 'Explain the History and Evolution of Java.', 4),
(216, 2, 'Programming with Java(261201CA)', 1, 'Create a java program to display â€œHello! Javaâ€ using Class, Object, and Method.', 4),
(217, 2, 'Programming with Java(261201CA)', 1, 'Define Data Type. Criticize the declaration of variables in Java.', 4),
(218, 2, 'Programming with Java(261201CA)', 1, 'What is Byte Code? Interpret the different states of Java Program execution.', 4),
(219, 2, 'Programming with Java(261201CA)', 1, 'What is an Operator? Explain the type of operators in Java with example programs.', 8),
(220, 2, 'Programming with Java(261201CA)', 1, 'Explain in detail about Garbage Collector in Java.', 4),
(221, 2, 'Programming with Java(261201CA)', 1, 'Define Class, Method, and Object. Show the syntax to define these in java.', 8),
(222, 2, 'Programming with Java(261201CA)', 1, 'Create a class to calculate the Area of a circle with one data member to store the radius and another to store the area value.\nCreate method members\n1. init - to input radius from the user\n2. calc - to calculate area\n3. display- to display area\n', 8),
(223, 2, 'Programming with Java(261201CA)', 1, 'Create a class MathOperation with two data members X and Y to store the operand and a third data member R to store the result of the operation.\nCreate method members\n1.	init - to input X and Y from the user\n2.	add - to add X and Y and store in R\n3.	multiply - to multiply X and Y and store in R\n4.	power - to calculate X Y and store in R\n5.	display- to display Result R\n', 8),
(224, 2, 'Programming with Java(261201CA)', 1, 'Create a class MathOperation containing a method â€˜multiplyâ€™ to calculate the multiplication of the following arguments.\na. two integers\nb. three float\nc. all elements of array\nd. one double and one integer\n', 8),
(225, 2, 'Programming with Java(261201CA)', 1, 'Create a class Person with properties (name and age) with the following features.\na. Default age of the person should be 18;\nb. A person object can be initialized with name and age;\nc. Method to display name and age of person\n', 8),
(226, 2, 'Programming with Java(261201CA)', 1, 'Create a class Employee with(empNo ,salary and totalSalary) ) with following features.\na. Only parameterized constructor;\nb. totalSalary always represents the total of all the salaries of all employees created.\nc. empNo should be auto-incremented.\nd. display total employees and totalSalary using the class method.', 8),
(227, 2, 'Programming with Java(261201CA)', 1, 'Create class Product (pid, price, quantity) with parameterized constructor. Create a main function in a different class (say XYZ) and perform the following task:\na. Accept five product information from the user and store it in an array\nb. Find Pid of the product with the highest price.\nc. Create a method (with an array of productâ€™s object as argument) in XYZ class to calculate and return the total amount spent on all products. (amount spent on single product=price of product * quantity of product)\n', 8),
(228, 2, 'Programming with Java(261201CA)', 1, 'What is a Constructor? Explain types of Constructors in Java. Write a java program to find the Area of Circle using Constructor.', 8),
(229, 2, 'Programming with Java(261201CA)', 1, 'What is constructor chaining & why do we need it? Give an example.', 4),
(230, 2, 'Programming with Java(261201CA)', 1, 'Discuss the static, final keywords with an example.', 4),
(231, 2, 'Programming with Java(261201CA)', 1, 'Write a Java program to implement the multilevel inheritance concept.', 8),
(232, 2, 'Programming with Java(261201CA)', 1, 'Write a java program to implement multiple inheritance concepts.', 8),
(233, 2, 'Programming with Java(261201CA)', 1, 'Discuss the super keyword in Java with an example code.', 4),
(234, 2, 'Programming with Java(261201CA)', 1, 'Compare Method Overriding and Method Overloading with suitable example codes.', 8),
(235, 2, 'Programming with Java(261201CA)', 1, 'What is polymorphism? Explain run-time polymorphism with an example.', 8),
(236, 2, 'Programming with Java(261201CA)', 1, 'Explain the Dynamic Method Dispatch in Java with an example program.', 8),
(237, 2, 'Programming with Java(261201CA)', 2, 'What is Exception? Why do exceptions occur in the program? Explain with a suitable example.', 4),
(238, 2, 'Programming with Java(261201CA)', 2, 'What is a Java Exception and itâ€™s Types?', 4),
(239, 2, 'Programming with Java(261201CA)', 2, 'What is the use of try-catch and finally statement give an example.', 4),
(240, 2, 'Programming with Java(261201CA)', 2, 'Show what is meant by Uncaught Exception.', 4),
(241, 2, 'Programming with Java(261201CA)', 2, 'List Javaâ€™s Built-in Exception? Write the importance of finally block.', 8),
(242, 2, 'Programming with Java(261201CA)', 2, 'Write a Java program to create own exception for Negative Value Exception if the user enters a negative value.', 8),
(243, 2, 'Programming with Java(261201CA)', 2, 'Write a Java program to read a number from the user and check if it is Prime or not. If the given number is negative or zero then throw an exception and give a message â€œEnter number greater than zeroâ€.', 8),
(244, 2, 'Programming with Java(261201CA)', 2, 'Write a Java program to accept a password from the user and throw an â€œAuthentication Failureâ€ exception if the password is incorrect.', 8),
(245, 2, 'Programming with Java(261201CA)', 2, 'Write a program to input the name and balance of the customer and thread a user-defined exception if the balance is less than 1500.', 8),
(246, 2, 'Programming with Java(261201CA)', 2, 'Write a program to create two threads, so one thread will print even numbers between 1 to 10 whereas the other will print odd numbers between 11 to 20.', 8),
(247, 2, 'Programming with Java(261201CA)', 2, 'Explain Java exception hierarchy.', 4),
(248, 2, 'Programming with Java(261201CA)', 2, 'Summarize in detail about chained Exception.', 4),
(249, 2, 'Programming with Java(261201CA)', 2, 'Create a class Voter(voterId, name, age) with parameterized constructor. The parameterized constructor should throw a checked exception if the age is less than 18. The message of exception is â€œinvalid age for voterâ€', 8),
(250, 2, 'Programming with Java(261201CA)', 2, 'Give the difference between checked and unchecked exceptions.', 4),
(251, 2, 'Programming with Java(261201CA)', 2, 'Show the use of finally statements with examples.', 4),
(252, 2, 'Programming with Java(261201CA)', 2, 'What is thread? Draw thread life cycle diagram in Java.', 4),
(253, 2, 'Programming with Java(261201CA)', 2, 'What is Multithreading? What are the ways to create multiple threads in java?', 4),
(254, 2, 'Programming with Java(261201CA)', 2, 'Explain how to create a new thread using the class Thread with a suitable example code.', 8),
(255, 2, 'Programming with Java(261201CA)', 2, 'Write a Java program that creates three threads. The first thread displays â€œHello!â€ every one second, the second thread displays â€œWear Mask !â€ every two seconds, and â€œUse Sanitizer !â€ every 5 seconds.', 8),
(256, 2, 'Programming with Java(261201CA)', 2, 'Write the difference between Extending the thread and implementing runnable.', 4),
(257, 2, 'Programming with Java(261201CA)', 2, 'Explain the Thread Life Cycle.', 4),
(258, 2, 'Programming with Java(261201CA)', 2, 'What is thread priority? Write default priority values and methods to change them.', 4),
(259, 2, 'Programming with Java(261201CA)', 2, 'Describe the methods used to establish used to establish inter-thread communication in Java.', 8),
(260, 2, 'Programming with Java(261201CA)', 2, 'Write a java program to implement wait() and join() method in multithreading.', 8),
(261, 2, 'Programming with Java(261201CA)', 2, 'Define String. Explain different String declarations with an example.', 4),
(263, 2, 'Programming with Java(261201CA)', 2, 'Write a Java program to check whether the given string is palindrome or not.', 8),
(264, 2, 'Programming with Java(261201CA)', 2, 'Write the syntax and purpose of any five String class methods with example code.', 8),
(265, 2, 'Programming with Java(261201CA)', 2, 'Write the difference between String and StringBuffer classes.', 8),
(266, 2, 'Programming with Java(261201CA)', 2, 'Input the name of a person and count how many vowels it contains. Use String class functions.', 8),
(267, 2, 'Programming with Java(261201CA)', 2, 'Input data exactly in the following string format, and print the sum of all integer values. â€œ67, 89, 23, 67, 12, 55, 66â€.', 8),
(268, 2, 'Programming with Java(261201CA)', 2, 'Store the name of weekdays in an array (starting from â€œSundayâ€ at 0 index). Ask for the day position from the user and print the day name. Handle array index out of bound exception and give a proper message if a user enters the day index outside range (0-6).', 8),
(269, 2, 'Programming with Java(261201CA)', 2, 'Explain FileWriter and FileReader class with an example', 8),
(270, 2, 'Programming with Java(261201CA)', 2, 'Write a program to copy one text file into another text file using FileReader and FileWriter.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sno` int(11) NOT NULL,
  `department` varchar(30) NOT NULL,
  `sem` int(10) NOT NULL,
  `subject` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sno`, `department`, `sem`, `subject`) VALUES
(7, 'MCA', 2, 'Programming with Java(261201CA)'),
(14, 'MCA', 2, 'Operating System (261204CA)'),
(15, 'MCA', 1, 'Advance Computer Network(261103CA)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mba`
--
ALTER TABLE `mba`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `mca`
--
ALTER TABLE `mca`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mba`
--
ALTER TABLE `mba`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mca`
--
ALTER TABLE `mca`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
