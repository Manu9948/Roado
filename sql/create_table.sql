CREATE TABLE IF NOT EXISTS stores1 (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nameOfOutlet` varchar(255) DEFAULT NULL,
  `nameOfProvider` varchar(255) DEFAULT NULL,
  `smartphone` varchar(1) DEFAULT NULL,
  `phone1` varchar(10) DEFAULT NULL,
  `phone2` varchar(10) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `openingTime` varchar(10) DEFAULT NULL,
  `closingTime` varchar(10) DEFAULT NULL,
  `establishedYear` varchar(4) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS VehiclesServiced(
  `id` int unsigned NOT NULL,
  `typeOfVehicleServiced` varchar(50) NOT NULL,
  FOREIGN KEY(id) REFERENCES stores1(id) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(id,typeOfVehicleServiced)
);

CREATE TABLE IF NOT EXISTS makeOfVehicles(
  `id` INT unsigned NOT NULL,
  `makeOfVehiclesServiced` varchar(50) NOT NULL,
  FOREIGN KEY(id) REFERENCES stores1(id) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(id,makeOfVehiclesServiced)
);

CREATE TABLE IF NOT EXISTS service(
  `id` INT unsigned NOT NULL,
  `typeOfService` varchar(50) NOT NULL,
  FOREIGN KEY(id) REFERENCES stores1(id) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(id,typeOfService)
);

CREATE TABLE IF NOT EXISTS servicesAvbl(
  `id` INT unsigned NOT NULL,
  `serviceAvailable` varchar(50) NOT NULL,
  FOREIGN KEY(id) REFERENCES stores1(id) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(id,serviceAvailable)
);
