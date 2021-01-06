-- NOTE: All tables names are in lower case; Database name is
-- all lower case as well.

-- **IMPORTANT**
-- Change abcd to your username on the next 3 lines before running this script!
DROP DATABASE IF EXISTS db;
CREATE DATABASE db;
USE db;

CREATE TABLE projects (
project_name VARCHAR(40) NOT NULL,
start_date DATE NOT NULL,
due_date DATE NOT NULL,
description VARCHAR(10000) NOT NULL
);

CREATE TABLE tasks (
project_name VARCHAR(40) NOT NULL,
task_name VARCHAR(30) NOT NULL,
priority VARCHAR(1) NOT NULL,
completed VARCHAR(1) NOT NULL,
start_date DATE NOT NULL,
due_date DATE NOT NULL,
description VARCHAR(10000) NOT NULL
);

INSERT INTO projects VALUES ("Java Swing Tower defence", '2019-02-12','2019-02-21', 'A univeristy assignment to create a game in the java swing module without external libraries. Without prior knowledge about gameloops this game runs with the help of a thread handler and quastionable logic. Its great to look back at to see how for one have improved with the times.');
INSERT INTO projects VALUES ('SE Production Line Requirements', '2019-02-12','2019-02-21', 'description' );
INSERT INTO projects VALUES ('custom-dequeue-and-BST', '2019-02-12','2019-02-21', 'practising double-ended queue (dequeue) and Binary search trees' );
INSERT INTO projects VALUES ('8puzzle-solver', '2019-02-12','2019-02-21', 'The 8-puzzle consists of a 3 by 3 grid. On each grid square there is a title, except for one square that remains empty. The 8 tiles are numbered from 1 to 8 respectively, so that each tile can be uniquely identified. A tile next to the empty square can be moved into the empty space, leaving its previous square empty in turn. The objective of the 8-puzzle problem is to find a solution, a sequence of tile moves, which leads from any initial grid configuration to a given goal grid configuration, e.g., we can give this solver a grid containing the numbers 1-8 and it will provide us with a solution by using an exhaustive width first binary search tree algorithm. this will go trough the !9 = 133496 possible combinations and return the quickest one.' );

INSERT INTO projects VALUES ('SpaceCraft-Asteroids', '2019-02-12','2019-02-21', 'A handcrafted pure java 2d take on the classic game "Asteroids". It can be run using the .Jar executables in high or low resolution or by compiling the code and running "GameSystem.java" located in lab3/src/game2' );
INSERT INTO projects VALUES ('virtual-function-word-filter', '2019-02-12','2019-02-21', 'University assignment in C++ programming. Basic exercises showcasing virtual function usage, file handling and none-graphical user interaction. Developed in CLion from JetBrains, CMakeLists.txt decides active project files and structure, its currently set to ex2 which is the described project. there are 3 diffferent filters to choose from when analyzing a text document. The first filter looks for words with at least one lowercase and no uppercase. filter 2 looks for at elast 2 leters and one digit, in the third it looks for words matchig one letter and at least one punctuation character.' );
INSERT INTO projects VALUES ('decode-block-cipher', '2019-02-12','2019-02-21', 'security exercise in AES decoding' );
INSERT INTO projects VALUES ('ce291-team-project ', '2019-02-12','2019-02-21', 'The Education Committee (EC) of the CSEE department require a tool to help them analyse student marks data from previous years. This will help the planning of future modules to include into the CSEE degree, and to fine tune existing modules to make their difficulty levels more appropriate. It also will allow identification of any weak or strong areas of teaching, so that high teaching standards can be maintained. ' );
INSERT INTO projects VALUES ('socket-based-servers-and-clients', '2019-02-12','2019-02-21', "Creator: Dan Norstrom, dn18657, 1807572, NORST42202
Course: CE303 Advanced Programming
Related to: Assignment
Date: 2020-12-01

C# Client:
	Project Folder: CClient

	Main class: 	ClientProgram.cs

	Depends on: 	Java/C# server.

	Start method: 	Execute as 'dotnet run' in local folder, from CMD or IDE.
			Take note of <StartupObject>CClient.ClientProgram</StartupObject>
			In the CClient.csproj to acertain correct startup file.
			
	Effect: Client runs responses and commands from CMD/IDE-console.

	Usage:	When engaged the clients prints all commands available to the trader
		in CMD. The Trader may use these commands to communicate with the server.
		(for some reasons this might be named 'BankClient' in IntelliJ, im not
		sure why, but its probablly bc i reused folders from this courses labs

	Developed with:	MVC using DotNet version 3.1.403

	Tested on lab-machines: Yes, runnable.


C# Server:
	Project Folder: CServer

	Main class: 	ServerProgram.cs

	Start method: 	Execute as 'dotnet run' in local folder, from CMD or IDE.
			Take note of <StartupObject>CServer.ServerProgram</StartupObject>
			in the CServer.csproj to acertain correct startup file.

	Effect: Server runs and shows Events in CMD/IDE-console.

	Usage:	There is no direct interaction with the server trough CMD/IDE-console.
		It simply shows the required events. (for some reasons this might be named
		'BankServer' in INtelliJ, im not sure why, but its probablly bc i reused
		folders from this courses labs.

	Developed with:	MVC using DotNet version 3.1.403

	Tested on lab-machines: Yes, runnable.


Java Client:
	Project Folder: JavaAssignment/src/

	Package: 	client

	Main class: 	ClientProgram.java

	Depends on: 	Java/C# server.

	Start method: 	Execute as java application from CMD or IDE.

	Effect:		This Brings up the GUI that communicates with the server

	Usage: 	While Current client owns stock (Green list-status)
		The client may mark another client in the list by clicking on them
		When a client is marked the current client may send its stock by clicking
		the 'send stock' button.
		a server/client repsonse message is showed at the bottom of every client.

	List-status:	Green: The current Client has stock.
			Blue: The current Client.
			Red: Client with Stock.

	Developed with:	Eclipse using Java - JRE System Library [jre1.8.0_161]

	Tested on lab-machines: Yes, runnable.
			

Java Server:
	Project Folder: JavaAssignment/src

	Package: 	server

	Main Class: 	ServerProgram.java

	Start method: 	Execute as java application from CMD or IDE.

	Effect: 	This brings up the Server GUI, showing all connected traders.

	Usage: 	At the top of the gui all the active traders are showcased.
		Green status is active Trader with stock.
		At the bottom the server console shows the required events and exceptions.

	Developed with:	Eclipse using Java - JRE System Library [jre1.8.0_161]

	Tested on lab-machines: Yes, runnable." );
INSERT INTO projects VALUES ('webscraping-currencies', '2019-02-12','2019-02-21', 'Locating and extracting currencies from a webpage. Webscraping and data-extraction using BeautifulSoup and regex' );
INSERT INTO projects VALUES ('nas_software', '2019-02-12','2019-02-21', "a bachelor / capstone job made by Dan Åke Rune Norström.
Creating a platform where intensive care nurses can deliver NAS-scores swiftly while adhering to the NAS model.
Providing a report dashboard where healthcare management recieves reports about the hospitals status,
this report will contain:

    recommended amount of nurses required
    patient weights
    nurse weights
    nas score daily, avarage, monthly and yearly.
    percentage of days above recommended nas-score

will hopefully contain: * regional control over multiple hospitals, creating regional reports. * countrywide coverage, manage intensive care units country-wide. (hopefully Docker will shine in this stage) " );

INSERT INTO tasks VALUES ('nas_software','example task', "H", "N", '2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "H", "Y",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "L", "N",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "H", "Y",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "M", "N",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "H", "Y",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "H", "N",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "M", "N",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "L", "Y",'2019-02-12','2019-02-21', 'example description' );
INSERT INTO tasks VALUES ('nas_software','example task', "H", "N",'2019-02-12','2019-02-21', 'example description' );
