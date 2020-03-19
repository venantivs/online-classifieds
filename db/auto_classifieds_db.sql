DROP DATABASE IF EXISTS AUTO_CLASSIFIEDS_DB;

CREATE DATABASE AUTO_CLASSIFIEDS_DB;

USE AUTO_CLASSIFIEDS_DB;

CREATE TABLE Users (Users_ID 		INT PRIMARY KEY AUTO_INCREMENT,
		    Users_FirstName 	VARCHAR(256),
                    Users_LastName 	VARCHAR(256),
		    Users_SignDate	DATE,
		    Users_Phone		VARCHAR(16),
		    Users_Picture	VARCHAR(1024),
                    Users_Email		VARCHAR(512),
                    Users_Password	VARCHAR(128));
                    
CREATE TABLE Classifieds (Classifieds_ID 			INT PRIMARY KEY AUTO_INCREMENT,
			  Classifieds_Date			DATE,
                          Classifieds_Description 		TEXT,
                          Classifieds_Price			DECIMAL,
                          Classifieds_VideoLink			VARCHAR(4096),
                          Classifieds_UF			VARCHAR(2),
                          Classifieds_City			VARCHAR(128),
                          Classifieds_Type			VARCHAR(10),
                          Users_ID_FK				INT,
                          FOREIGN KEY (Users_ID_FK) REFERENCES Users (Users_ID));
                          
CREATE TABLE Classifieds_Pictures (Classifieds_Pictures_ID		INT PRIMARY KEY AUTO_INCREMENT,
								   Classifieds_Pictures_FileName	VARCHAR(1024),
                                   Classifieds_ID_FK				INT,
                                   FOREIGN KEY (Classifieds_ID_FK) REFERENCES Classifieds (Classifieds_ID));
                                  
CREATE TABLE Classifieds_Cars (Classifieds_Cars_ID			INT PRIMARY KEY AUTO_INCREMENT,
							   					 				       Classifieds_Cars_Brand			VARCHAR(128),
                               Classifieds_Cars_Model			VARCHAR(128),
                               Classifieds_Cars_Version			VARCHAR(16),
			       Classifieds_Cars_Year			INT,
                               Classifieds_Cars_Fuel			VARCHAR(16),
                               Classifieds_Cars_Transmission		VARCHAR(32),
                               Classifieds_Cars_Doors			INT,
                               Classifieds_Cars_Engine			VARCHAR(32),
                               Classifieds_Cars_Colors			VARCHAR(32),
                               Classifieds_Cars_Metreage		INT,
                               Classifieds_ID_FK			INT,
                               FOREIGN KEY (Classifieds_ID_FK) REFERENCES Classifieds (Classifieds_ID));
                               
CREATE TABLE Classifieds_Cars_Items (Classifieds_Cars_Items_ID					INT PRIMARY KEY AUTO_INCREMENT,
				     Classifieds_Cars_Items_HasAirConditioning 	BOOL,
				     Classifieds_Cars_Items_HasLeatherSeats	BOOL,
                                     Classifieds_Cars_Items_HasRearHeadrest	BOOL,
                                     Classifieds_Cars_Items_HasPowerLocks	BOOL,
                                     Classifieds_Cars_Items_HasPowerMirrors	BOOL,
                                     Classifieds_Cars_Items_HasHeatedSeats	BOOL,
                                     Classifieds_Cars_Items_HasBoardComputer	BOOL,
                                     Classifieds_Cars_Items_HasReverseSensor	BOOL,
                                     Classifieds_Cars_Items_HasMultimediaCenter	BOOL,
                                     Classifieds_Cars_Items_HasGPS		BOOL,
                                     Classifieds_Cars_Items_HasPowerSteering	BOOL,
                                     Classifieds_Cars_Items_HasAutoPilot	BOOL,
                                     Classifieds_Cars_ID_FK			INT,
                                     FOREIGN KEY (Classifieds_Cars_ID_FK) REFERENCES Classifieds_Cars (Classifieds_Cars_ID));

CREATE TABLE Classifieds_Motorcycles (Classifieds_Motorcycles_ID		INT PRIMARY KEY AUTO_INCREMENT,
									  Classifieds_Motorcycles_Brand		VARCHAR(128),
                                      Classifieds_Motorcycles_Model 	VARCHAR(128),
                                      Classifieds_Motorcycles_Version	VARCHAR(16),
                                      Classifieds_Motorcycles_Fuel		VARCHAR(16),
                                      Classifieds_Motorcycles_Color		VARCHAR(32),
                                      Classifieds_Motorcycles_Metreage	INT,
                                      Classifieds_ID_FK					INT,
                                      FOREIGN KEY (Classifieds_ID_FK) REFERENCES Classifieds (Classifieds_ID));
                                      
CREATE TABLE Classifieds_Motorcycles_Items (Classifieds_Motorcycles_Items_ID				INT PRIMARY KEY AUTO_INCREMENT,
											Classifieds_Motorcycles_Items_HasFrontBrakeDisk	BOOL,
                                            Classifieds_Motorcycles_Items_HasBackBrakeDisk	BOOL,
                                            Classifieds_Motorcycles_Items_HasABS			BOOL,
                                            Classifieds_Motorcycles_Items_HasPowerStart		BOOL,
                                            Classifieds_Motorcycles_Items_HasAlloyWheels	BOOL,
                                            Classifieds_Motorcyles_ID_FK					INT,
                                            FOREIGN KEY (Classifieds_Motorcyles_ID_FK) REFERENCES Classifieds_Motorcycles (Classifieds_Motorcycles_ID));

                                      
                                      
