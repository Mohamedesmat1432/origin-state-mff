/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: db    Database: origins_state_db
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '66e3a743-5665-4612-8d45-49f37f9658e9',
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES
('00a2fcac-d06b-45ae-a0ab-a9d287a760df','default','OriginDetail has been created','App\\Models\\OriginDetail','created','225eec6a-478a-4bd4-a0e6-33c93e619d8b','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 920, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 920, \"administrative_units\": null, \"number_of_buildings_executed\": 46}}',NULL,'2025-08-06 15:53:42','2025-08-06 15:53:42'),
('00d5c8a6-2821-4c78-a265-440234814346','default','Origin has been created','App\\Models\\Origin','created','a19237b5-9d95-4e6d-ac97-80d6c372a4f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"2e13f5e6-db0a-4917-af2f-cbe114ca966e\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"223512.65\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"108\", \"total_area_coords\": \"223512.65\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"223512.65\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('00da5003-20a8-4d72-b232-b1c1e86141e2','default','City has been created','App\\Models\\City','created','ea1af02c-a881-43bb-93fa-5dcec457b509',NULL,NULL,'{\"attributes\": {\"name\": \"الدقى\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('023f4493-60b6-49a4-a714-db5102af300a','default','OriginDetail has been created','App\\Models\\OriginDetail','created','fd1e78d2-03ea-4bed-90f2-4a4111cdfe11','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": 0, \"commercial_units\": 0, \"residential_units\": 5100, \"administrative_units\": 0, \"number_of_buildings_executed\": 300}}',NULL,'2025-08-06 15:33:41','2025-08-06 15:33:41'),
('02d01dd1-57d5-4418-9061-9d543df9b8da','default','Origin has been updated','App\\Models\\Origin','updated','0bf2f408-7733-47f9-8805-9847cc3408cd','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/tFCgRQ5FDQImOj4X9JGUpSlff4vVUT7otWJYmdmW.pdf\"}}',NULL,'2025-05-04 13:04:22','2025-05-04 13:04:22'),
('033b14d0-6d4b-4db2-85b0-c6b941c26a1c','default','Origin has been created','App\\Models\\Origin','created','7955112d-dbc7-4eb6-b1c9-e5b66b8c4b39','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"notes\": null, \"city_id\": \"28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363\", \"location\": \"شالية رقم (6) الدور الثاني نموذج (ش 2/2)\", \"used_area\": \"108\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"project_id\": \"d5789031-9704-4f5a-9928-b13491d9dbe5\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"0\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"decision_date\": 2020, \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"accept\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"108\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"108\"}}',NULL,'2025-05-06 09:43:43','2025-05-06 09:43:43'),
('03af8038-6817-4096-8e0a-1add6eacb169','default','City has been created','App\\Models\\City','created','f5188029-0da4-4769-a0bd-0f0b3d5491f3',NULL,NULL,'{\"attributes\": {\"name\": \"القرية الذكية\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('042248e5-ab57-463c-bfd4-b7dbfce92d77','default','City has been created','App\\Models\\City','created','fd11bfcf-5fb1-4c43-802f-63bb6ab885ba',NULL,NULL,'{\"attributes\": {\"name\": \"سمسطا\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('04c1f2d8-93ac-4fc9-a7ab-de564597a607','default','City has been created','App\\Models\\City','created','67a33fc8-b1b1-4ef3-90f0-d87dad1663e8',NULL,NULL,'{\"attributes\": {\"name\": \"الفيوم\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('04caa1e7-4a0a-48f9-9686-1e94d2b94d90','default','Origin has been updated','App\\Models\\Origin','updated','12782081-8b6f-49c8-b0df-c0dd0b5b66bc','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\"}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\"}}',NULL,'2025-08-06 16:17:45','2025-08-06 16:17:45'),
('04f3eef3-3166-424a-9553-564c89c4f64e','default','OriginDetail has been created','App\\Models\\OriginDetail','created','0cdc5825-88c5-407b-9693-fef60dadfec7','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-07 08:43:14','2025-08-07 08:43:14'),
('0501ff62-d7be-4785-80f4-575c9629c672','default','Origin has been created','App\\Models\\Origin','created','1f01aa2f-91d9-4880-9455-32c7d6844eda','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"تقسيم الحجاز منطقة أبوعشرة \", \"used_area\": \"300\", \"project_id\": \"5d2fdb65-6f23-4453-bb6a-61f035f44056\", \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"46670\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"24\", \"total_area_coords\": \"615000\", \"executing_entity_num\": \"568330\", \"total_area_allocated\": \"615000\"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('055ccdf1-7100-462b-b3e9-541446b98e5a','default','Government has been created','App\\Models\\Government','created','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658',NULL,NULL,'{\"attributes\": {\"name\": \"المنوفية\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('05940745-47d3-4831-8a4b-5177306f190f','default','City has been created','App\\Models\\City','created','452baeeb-6df6-4753-a19c-2fe8cfb80c48',NULL,NULL,'{\"attributes\": {\"name\": \"العصافرة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('059d105f-d08d-4307-b953-f60b2fcc2677','default','Origin has been updated','App\\Models\\Origin','updated','9b372dd0-c0c6-497b-8c7b-3592ab39182a','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"24225\"}, \"attributes\": {\"coordinates\": [[[689084.4337000006, 2773755.2698999993], [689232.8013000002, 2773757.6957999994], [689238.4325999997, 2773622.459099999], [689150.6227000003, 2773621.4559], [689149.6955000007, 2773575.0496], [689086.5587999996, 2773573.693199999], [689084.4337000006, 2773755.2698999993]]], \"total_area_coords\": \"23325.246728736\"}}',NULL,'2025-05-29 12:55:12','2025-05-29 12:55:12'),
('0667bbc5-5238-4cf2-98f4-bcefc31f9cce','default','Project has been created','App\\Models\\Project','created','44294172-144a-46d7-9eff-5bb89b99c899','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 22 عمارة تقسيم القمر - سفاجا \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('06a1fcd2-a9d1-43eb-8ef2-793150515b00','default','Origin has been updated','App\\Models\\Origin','updated','f7749517-9435-4661-8752-166aba77978f','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"created_by\": null}, \"attributes\": {\"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\"}}',NULL,'2025-05-04 03:31:19','2025-05-04 03:31:19'),
('06bf98cb-a6a3-4f27-a34d-1eff71920994','default','City has been created','App\\Models\\City','created','b2a50518-7f9e-4d99-a424-598d372dc491',NULL,NULL,'{\"attributes\": {\"name\": \"اطسا\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('07df0945-6360-43c7-b604-25605a149162','default','City has been created','App\\Models\\City','created','f9a6cba4-491c-4cd7-aaaa-bacf22d2fbae',NULL,NULL,'{\"attributes\": {\"name\": \"كفر الزيات\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('08c89916-f58b-4e6e-a9bf-5af7b44031dc','default','OriginDetail has been created','App\\Models\\OriginDetail','created','5ab4c8b9-ac3a-4b1b-b546-a38f83540bc6','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 700, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 700, \"administrative_units\": null, \"number_of_buildings_executed\": 35}}',NULL,'2025-08-07 08:43:14','2025-08-07 08:43:14'),
('08f94756-e0d8-472b-9001-138f9404ec87','default','City has been created','App\\Models\\City','created','cccabb0b-4a38-41fa-a738-467bb2e45d75',NULL,NULL,'{\"attributes\": {\"name\": \"سمنود\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('09ffc869-a321-4c87-b5c5-fa1dfec2d546','default','Origin has been updated','App\\Models\\Origin','updated','183885e1-7681-42cf-a63c-99fecd470fa3','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"85\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"93900\"}, \"attributes\": {\"city_id\": \"776efd16-c76e-4d71-a29b-c7dc7343bb2b\", \"used_area\": \"93900\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"85\"}}',NULL,'2025-05-04 12:57:14','2025-05-04 12:57:14'),
('0a1fc769-48bc-4f78-bc24-de221c674461','default','City has been created','App\\Models\\City','created','c8c583e1-56ee-4020-9cb5-48b4c924e6c0',NULL,NULL,'{\"attributes\": {\"name\": \"أخميم الجديدة\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('0a85b42d-2091-4ca0-baab-2c09b8739124','default','City has been created','App\\Models\\City','created','c3fb8f0a-9d8b-45c9-8ab8-aad0ea928bda',NULL,NULL,'{\"attributes\": {\"name\": \"السنطة\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('0a902f91-c207-4cd3-904a-05e0efb72aa5','default','City has been created','App\\Models\\City','created','3e7d1f6a-ec24-4cee-94e6-79de6e715c18',NULL,NULL,'{\"attributes\": {\"name\": \"المعصرة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('0aad6af0-873e-4010-9600-acdaf53e2d86','default','City has been created','App\\Models\\City','created','c58138ce-28dc-4be7-a427-9eb91123acfe',NULL,NULL,'{\"attributes\": {\"name\": \"المنيب\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0acca700-59b2-4e7a-a99c-0e29b188ef93','default','City has been created','App\\Models\\City','created','f0ee73ca-082e-44bd-b4f8-f4872c3dddd8',NULL,NULL,'{\"attributes\": {\"name\": \"السادس من أكتوبر\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0bb99704-14f5-47f2-a84f-4cab2b3697ea','default','City has been created','App\\Models\\City','created','5f236532-7afc-4fe3-a04c-656b87d56bf9',NULL,NULL,'{\"attributes\": {\"name\": \"البلينا\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('0c0dd3c0-2589-418d-a776-a262add06b7c','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"revised_by\": null, \"origin_status\": \"inprogress\"}, \"attributes\": {\"revised_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"origin_status\": \"revision\"}}',NULL,'2025-05-04 03:37:29','2025-05-04 03:37:29'),
('0c653c07-2d15-4811-8f77-4525578a5358','default','Origin has been created','App\\Models\\Origin','created','8b732ff0-c5ac-453e-9f90-bb3ca202b240','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم دمج الثلاث مناطق \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم القمر \", \"used_area\": \"22\", \"created_by\": null, \"project_id\": \"721373d9-6c9f-407e-afe3-638f8b5e6dcc\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"142\", \"statement_id\": \"114e446a-71c7-4e79-a6d5-0ddf770b7a8d\", \"decision_date\": 2014, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"55500\", \"executing_entity_num\": \"55500\", \"total_area_allocated\": \"55500\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('0e536105-fe11-44bc-9ba4-c3396b77ae05','default','TypeService has been created','App\\Models\\TypeService','created','57204723-827c-4b46-894e-24bd41913e43','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"محلات\"}}',NULL,'2025-08-17 12:18:05','2025-08-17 12:18:05'),
('0f40d003-c727-4b3f-93a4-b54fe57b9047','default','City has been created','App\\Models\\City','created','cc839f2c-6888-484e-a5ff-12ef504740f5',NULL,NULL,'{\"attributes\": {\"name\": \"كفر غطاطي\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0f419622-fbb1-4e37-a37d-5679fc2849b5','default','OriginDetail has been created','App\\Models\\OriginDetail','created','29db4aca-2fde-401e-9656-87b73f187388','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-06 15:58:44','2025-08-06 15:58:44'),
('108af248-6f8a-4579-b168-aa5a840d634d','default','City has been created','App\\Models\\City','created','8b635c0c-7a43-4b79-94ab-7dacd39b8fdc',NULL,NULL,'{\"attributes\": {\"name\": \"المندرة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('11448fea-a753-4c59-a979-f823910be1cd','default','City has been created','App\\Models\\City','created','6a46108d-cf50-4678-89b9-52eeea5358a4',NULL,NULL,'{\"attributes\": {\"name\": \"الهرم\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('114ca35c-ef8a-4bd3-a51a-3a34abda9106','default','City has been created','App\\Models\\City','created','2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f',NULL,NULL,'{\"attributes\": {\"name\": \"المعادى\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('120b43dd-f5e1-46c9-8781-8fca85fc7489','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999956]], \"total_area_coords\": \"135995.60650312\"}, \"attributes\": {\"coordinates\": [[574720.4207, 3018896.8962999997], [574559.346700001, 3018619.605900001], [574242.0389000006, 3018812.1655999995], [574440.9329000001, 3019155.2202999997], [574622.9824000001, 3019053.5445999987], [574586.7776999995, 3018994.2469999995]], \"total_area_coords\": \"137029.98108406\"}}',NULL,'2025-05-29 09:34:07','2025-05-29 09:34:07'),
('1240b3a0-90cb-4344-b914-73d0ddf173bc','default','City has been created','App\\Models\\City','created','51c0d654-7d4f-4260-93b3-4411a6a4be7e',NULL,NULL,'{\"attributes\": {\"name\": \"النزهة الجديدة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('129f771b-4137-4efe-ad12-af4915c348ed','default','EditRequestOrigin has been updated','App\\Models\\EditRequestOrigin','updated','40141f29-e8c3-4eaa-a1ca-a7321f87b14b','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"status\": \"pending\"}, \"attributes\": {\"status\": \"approved\"}}',NULL,'2025-06-02 06:53:11','2025-06-02 06:53:11'),
('12a1785a-e409-4377-9246-26e788730e31','default','City has been created','App\\Models\\City','created','d2852220-99cc-484f-af92-0b2861368bc3',NULL,NULL,'{\"attributes\": {\"name\": \"قها\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('12ba16ee-559f-407e-90f5-2256a77e199b','default','Origin has been created','App\\Models\\Origin','created','e8dfdbf9-945a-4033-abfe-67b715d1b7fd','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"تقسيم فلامنكو المنطقة الثانية \", \"used_area\": \"0\", \"project_id\": \"61455604-1ca5-4538-9f02-95468c2c85d3\", \"decision_num\": \"2524\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2023, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"72000\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"72000\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('1451d8f8-036f-48eb-b94b-7ec6bc35b10b','default','User has been updated','App\\Models\\User','updated','507e4996-9cd3-4732-8a24-a22b6035f03b','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"job_title_id\": \"c969eed4-c2f2-4b5e-a831-d4e6208c5f84\", \"department_id\": \"72bd59f9-a04e-414d-b668-c83fc9ab2b57\"}}',NULL,'2025-04-29 11:01:36','2025-04-29 11:01:36'),
('14aa3be8-c8cd-430a-b647-e64279e9082d','default','City has been created','App\\Models\\City','created','f9381993-2b5f-4aae-ba57-4ac9487e6111',NULL,NULL,'{\"attributes\": {\"name\": \"أولاد صقر\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1584fd17-b5f6-46cf-af15-8322a1783292','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/TtneqM8YHDThn120EIpPXbIIsoOpG12sodzdy8Dx.pdf\"}}',NULL,'2025-05-04 13:01:50','2025-05-04 13:01:50'),
('15a18119-d52a-43fb-98de-f6193f3dde5d','default','Project has been created','App\\Models\\Project','created','98f4004a-0c62-4daf-a2e7-bc37bca85658','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 126 عمارة تقسيم شمال الأحياء – الغردقة\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('15db925e-62a0-4a1a-bff1-385f9030e7f6','default','City has been created','App\\Models\\City','created','fbea947c-8051-4327-a87b-fe4e16a63ed3',NULL,NULL,'{\"attributes\": {\"name\": \"باب شرق\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('1680e3bb-73e3-4e97-8a58-674f8bf1d167','default','City has been created','App\\Models\\City','created','8cea773e-deb0-473c-b719-b6decf8be9d3',NULL,NULL,'{\"attributes\": {\"name\": \"الطور\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('16b2678c-f8ba-450c-a402-6d40078e4486','default','Origin has been created','App\\Models\\Origin','created','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"منطقة الأحياء بجوار بيتكو \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"e768b283-ce53-40bc-a80d-c77331ce8191\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"131895.64\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"excellent\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"62\", \"total_area_coords\": \"131895.64\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"131895.64\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('16c77ae8-2b56-4273-94fa-a12993c819b4','default','Statement has been created','App\\Models\\Statement','created','d13e1541-82c3-4f97-b5ad-4acc423dd119','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"لا يوجد\"}}',NULL,'2025-05-04 11:39:40','2025-05-04 11:39:40'),
('16f1896e-d0ff-4ec8-9395-102531dae958','default','Responsibility has been created','App\\Models\\Responsibility','created','48730245-efcd-42e0-a8e2-7e04de77b4b2',NULL,NULL,'{\"attributes\": {\"name\": \"الشئون القانونية\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('1718290f-49a5-458d-8d07-423f292ff1bc','default','City has been created','App\\Models\\City','created','ce7f4e2d-2e62-4bef-b927-e9a5c01a93b3',NULL,NULL,'{\"attributes\": {\"name\": \"النجيلة\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1730d99e-445d-45f8-ab4f-49da743a1c1b','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"132018.52\"}, \"attributes\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.407999997]], \"total_area_coords\": \"135995.60650319\"}}',NULL,'2025-05-25 07:35:54','2025-05-25 07:35:54'),
('175ce70b-1be4-4f96-8f1a-696ebff7c572','default','Department has been created','App\\Models\\Department','created','40dd2d94-04ee-487d-8dad-ed3b21245d6a',NULL,NULL,'{\"attributes\": {\"name\": \"القانونية\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('17d76e7e-175e-4dbf-a34d-2eedc763dea2','default','City has been created','App\\Models\\City','created','2df9cbd0-67fc-4292-aba5-a14e7672a48d',NULL,NULL,'{\"attributes\": {\"name\": \"عباسية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('18e539df-7c2d-45e6-b80e-0ebcbac90b28','default','Government has been created','App\\Models\\Government','created','054769fe-5fc5-4e1e-80b0-29540da931c0',NULL,NULL,'{\"attributes\": {\"name\": \"الأسكندرية\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('1a0321b3-abb2-4427-9c76-feb3072497ce','default','City has been created','App\\Models\\City','created','c6a1b890-f1c8-431c-a3b9-94768e9396d7',NULL,NULL,'{\"attributes\": {\"name\": \"سيدى بشر\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('1ae9d14c-7d72-4f4d-877e-e5c19258d40d','default','City has been created','App\\Models\\City','created','a7a4d3ba-3bc2-4b4b-a25c-c50b73141657',NULL,NULL,'{\"attributes\": {\"name\": \"طنطا\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('1aebd1a8-2650-45d9-b630-f2f1676bb608','default','City has been created','App\\Models\\City','created','821c6cb6-2fe2-4ae8-a7ae-f03d2091ff5a',NULL,NULL,'{\"attributes\": {\"name\": \"بيلا\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1b50313d-00cf-4c26-92d3-52a6d1a1816c','default','Origin has been created','App\\Models\\Origin','created','7c51e96b-c7f8-47ad-9ea4-a757cad843f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم المركز السياحي \", \"used_area\": \"19\", \"created_by\": null, \"project_id\": \"5b61a48d-df8d-431c-9b26-6da06ded6061\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"781\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2012, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"22867.47\", \"executing_entity_num\": \"22867.47\", \"total_area_allocated\": \"22867.47\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('1b811346-99dc-4487-8392-e698063daa2f','default','City has been created','App\\Models\\City','created','49a40067-552c-40bb-b443-4d061730a1d3',NULL,NULL,'{\"attributes\": {\"name\": \"قويسنا\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('1bcb788e-34cd-4a84-a58f-902625c05951','default','JobTitle has been updated','App\\Models\\JobTitle','updated','c969eed4-c2f2-4b5e-a831-d4e6208c5f84','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"name\": \"مدخل بيانات\"}, \"attributes\": {\"name\": \"مدخل بيانات 2\"}}',NULL,'2025-04-28 15:35:35','2025-04-28 15:35:35'),
('1c935e67-1093-4b7d-a7fd-6624cef1066f','default','City has been created','App\\Models\\City','created','02a732c2-8f0e-49ff-a2be-b6cd0250f7fa',NULL,NULL,'{\"attributes\": {\"name\": \"حوش عيسى\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('1ca24752-3e1b-4c80-b681-91b2e360d168','default','City has been created','App\\Models\\City','created','0ab5ed1d-9a17-4e19-8456-520b1c7965b3',NULL,NULL,'{\"attributes\": {\"name\": \"السرو\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1d3052cc-61ba-4068-941d-268f8ed7571f','default','City has been created','App\\Models\\City','created','e2734c6e-5769-40f5-b555-6dd48f4c95f9',NULL,NULL,'{\"attributes\": {\"name\": \"حى الزهور\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1d3b5334-7341-468b-bf47-fe249c1cf8f5','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999975]], \"total_area_coords\": \"135995.60650332\"}, \"attributes\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000004, 3013733.4079999984]], \"total_area_coords\": \"135995.60650346\"}}',NULL,'2025-05-27 09:46:09','2025-05-27 09:46:09'),
('1d423ad4-6251-478d-a1f3-b5ffba682632','default','City has been created','App\\Models\\City','created','105f9b1e-471c-4a85-accb-fddd6e14e070',NULL,NULL,'{\"attributes\": {\"name\": \"السلوم\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1de04223-96e1-4dc8-b836-b278b01c3089','default','Origin has been updated','App\\Models\\Origin','updated','34f0e90c-c6e9-4f64-917b-0a7200cefee5','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"210000\"}, \"attributes\": {\"coordinates\": [[[573520.3199999991, 3018917.7268], [573830.3173999996, 3018745.1243], [573848.1139, 3018705.6503], [573860.8031000005, 3018410.8478999995], [573454.6516000004, 3018401.8036], [573300.5689000003, 3018490.3712999993], [573297.5165000004, 3018513.438600001], [573520.3199999991, 3018917.7268]]], \"total_area_coords\": \"202341.27574643\"}}',NULL,'2025-05-29 13:00:01','2025-05-29 13:00:01'),
('1e1c46f3-5e27-498b-a670-3d3d2ad7b760','default','City has been created','App\\Models\\City','created','002a2858-dbe2-49cc-8595-626fd7b6e768',NULL,NULL,'{\"attributes\": {\"name\": \"السلام\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('1e52a535-04f0-4ea3-a321-39557476020b','default','Origin has been created','App\\Models\\Origin','created','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"878f1e13-ff8d-4768-a2ea-f685c33e6c44\", \"location\": \"kjs,n\", \"used_area\": \"65\", \"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"project_id\": \"2e13f5e6-db0a-4917-af2f-cbe114ca966e\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"25\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2025, \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\", \"origin_status\": \"inprogress\", \"available_area\": \"54\", \"decision_image\": null, \"remaining_area\": \"654\", \"location_status\": \"accept\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"523\", \"total_area_coords\": \"54214\", \"executing_entity_num\": \"524\", \"total_area_allocated\": \"6354\"}}',NULL,'2025-05-04 03:37:18','2025-05-04 03:37:18'),
('1e6570b8-a633-42ce-a69f-9a9dcc57a474','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-05-04 11:40:10','2025-05-04 11:40:10'),
('1e81937b-af73-458e-9853-36cc65ee8555','default','City has been created','App\\Models\\City','created','0092c51c-9d6f-42ff-8ee3-5a0e492f91ac',NULL,NULL,'{\"attributes\": {\"name\": \"الشيخ زايد\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('1ea45dfa-0491-4881-b036-399e56c4133e','default','Origin has been created','App\\Models\\Origin','created','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"شارع الحجاز تقسيم البداري\", \"used_area\": \"18\", \"created_by\": null, \"project_id\": \"2620cf73-50b0-49e2-9f8f-1c3bb68a3e9a\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"121018.52\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"62\", \"total_area_coords\": \"132018.52\", \"executing_entity_num\": \"11000\", \"total_area_allocated\": \"132018.52\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('1eb969d2-6267-41be-b21c-bb19ab645f7f','default','City has been created','App\\Models\\City','created','1a303b2d-4d75-4545-8db3-69cd760d3a54',NULL,NULL,'{\"attributes\": {\"name\": \"امبابة\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('1f51c895-3441-4b5d-b87c-e9a0d0362924','default','City has been created','App\\Models\\City','created','65ee46e6-a870-4ee4-8f27-ba221e43ecee',NULL,NULL,'{\"attributes\": {\"name\": \"طهطا\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('1feefe63-d58d-4a90-b453-d59b44c35980','default','City has been created','App\\Models\\City','created','007c29e5-3d41-40ed-9ba3-23409bfde7bd',NULL,NULL,'{\"attributes\": {\"name\": \"كفر البطيخ\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('20222aff-34e8-4901-83b7-60f606f22bd9','default','Origin has been updated','App\\Models\\Origin','updated','0fcbcbd8-1c21-4799-ad3a-e02975839dd6','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"19\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"22867.47\"}, \"attributes\": {\"city_id\": \"254eb4b1-4d6c-49bd-bbe7-82d8c477c69c\", \"used_area\": \"22867\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"19\"}}',NULL,'2025-05-04 12:53:16','2025-05-04 12:53:16'),
('2031220d-27a5-406d-b67a-549672d1e3fc','default','City has been created','App\\Models\\City','created','fc69d517-1c7f-4efe-89c0-6f41bf7b9738',NULL,NULL,'{\"attributes\": {\"name\": \"سوهاج\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('208a7a56-321d-4f41-b296-9f6de57513fc','default','OriginDetail has been created','App\\Models\\OriginDetail','created','08cfc612-54dc-4cbc-a8fd-c92ed5dd305b','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"40e8dcfc-d87c-4958-aa4d-b17bb05110f3\", \"unit_area\": \"90.00\", \"number_of_units\": 1000, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 1000, \"administrative_units\": null, \"number_of_buildings_executed\": 50}}',NULL,'2025-08-06 16:13:17','2025-08-06 16:13:17'),
('210c6b14-7386-4571-a627-66e3459f5539','default','Origin has been updated','App\\Models\\Origin','updated','133464b3-9283-4b66-89f7-a799c38d796d','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"coordinated_by\": null, \"total_area_coords\": \"72000\"}, \"attributes\": {\"coordinates\": [[[624804.2123999997, 2890784.1292999997], [624869.9446000007, 2890765.0675], [625050.6693999997, 2890370.1782999993], [625044.8259000004, 2890313.5053], [624960.5214999997, 2890270.5401000003], [624913.5899000012, 2890327.3215], [624890.9191000002, 2890345.2581], [624820.1210999994, 2890486.7358999997], [624771.1377999996, 2890583.8068], [624763.6455999996, 2890640.9671], [624804.2123999997, 2890784.1292999997]]], \"coordinated_by\": \"94000ccb-1c41-432a-a716-8f1edfc98a19\", \"total_area_coords\": \"74045.902586869\"}}',NULL,'2025-06-17 08:00:32','2025-06-17 08:00:32'),
('21765c97-0488-49a9-9112-a70b1361697b','default','OriginDetail has been created','App\\Models\\OriginDetail','created','f1e36485-b4b7-4629-8fc9-61d9a32a3a71','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 700, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 700, \"administrative_units\": null, \"number_of_buildings_executed\": 35}}',NULL,'2025-08-07 08:18:01','2025-08-07 08:18:01'),
('21cdfd46-7e8e-4e1b-a229-acef8d30d296','default','City has been created','App\\Models\\City','created','4e4a077d-8288-458d-9705-2f729d8f0d68',NULL,NULL,'{\"attributes\": {\"name\": \"دار السلام\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('220f920d-2e00-4a1a-8908-5a168235646d','default','City has been created','App\\Models\\City','created','a564eee3-2f07-4edc-87a2-14482e59ab9a',NULL,NULL,'{\"attributes\": {\"name\": \"دمنهور\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('221b6dae-bd49-4df5-aaff-de044b22395c','default','Origin has been updated','App\\Models\\Origin','updated','0bf2f408-7733-47f9-8805-9847cc3408cd','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"910977\"}, \"attributes\": {\"coordinates\": [[[579284.8234999999, 3012144.7095999992], [579462.8074000002, 3011540.9017], [579543.8153000013, 3011562.6526000006], [579570.5827, 3011506.5144], [579509.6614000008, 3011440.890300001], [579059.9583000011, 3011778.3361], [578712.4340000004, 3011232.4122], [578523.4731000005, 3010925.0491999993], [578225.7339000003, 3010983.4777999995], [577854.3353000006, 3011119.9151], [578430.1279000005, 3011504.7878000005], [579284.8234999999, 3012144.7095999992]]], \"total_area_coords\": \"0\"}}',NULL,'2025-05-29 13:05:27','2025-05-29 13:05:27'),
('223ccce9-e148-4c5f-96bd-786ed63e890b','default','City has been created','App\\Models\\City','created','d1a2e0e2-bdf6-45f9-af74-fe955ef50381',NULL,NULL,'{\"attributes\": {\"name\": \"طلخا\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('234a9fae-3429-44f0-b503-ea520f12b53c','default','City has been created','App\\Models\\City','created','75b84153-e0ff-4aa8-af2e-63485965df4b',NULL,NULL,'{\"attributes\": {\"name\": \"النزهة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('23535f69-f525-4d1e-9899-5f74fe58ca71','default','City has been created','App\\Models\\City','created','b455da4f-c883-4c3a-8717-103818b34a54',NULL,NULL,'{\"attributes\": {\"name\": \"الحضرة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('23cda80a-de21-4cd4-8c4d-3f82656fc590','default','City has been created','App\\Models\\City','created','8a3f6260-d541-454c-9d38-82dab5dea7d7',NULL,NULL,'{\"attributes\": {\"name\": \"المدينة الفكرية\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('24a16f2b-4626-47d3-8573-9c500fe8d9f8','default','User has been created','App\\Models\\User','created','b487eaf4-1582-4966-aace-bfa3a3a272d1',NULL,NULL,'{\"attributes\": {\"name\": \"عاطف احمد\", \"email\": \"atefahmed@gmail.com\", \"status\": 1, \"password\": \"$2y$10$BPq9EPu3G1TQ5zyGiliYOe2j3zTe5Gk7PDFcmJwxUcA32s0qzg8U2\", \"job_title_id\": null, \"phone_number\": \"01061295796\", \"department_id\": null, \"national_number\": \"26712201204419\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('25122cee-3c64-4598-9767-d99e2416f555','default','City has been created','App\\Models\\City','created','deb4227c-3bee-4d3a-87ae-45fd99527501',NULL,NULL,'{\"attributes\": {\"name\": \"مرسى علم\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('251356ce-9ba6-4daa-be0a-30c1a4c63644','default','City has been created','App\\Models\\City','created','f8b21779-bcfc-454b-b819-c94be8736607',NULL,NULL,'{\"attributes\": {\"name\": \"السيدة زينب\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('25652827-e8f6-4640-8ab0-9df30bfbc884','default','City has been created','App\\Models\\City','created','02044373-26aa-41cd-9828-b9981242de45',NULL,NULL,'{\"attributes\": {\"name\": \"القناطر الخيرية\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('256cdcd7-0e0a-4506-9e66-f708f89e78f1','default','Origin has been created','App\\Models\\Origin','created','133464b3-9283-4b66-89f7-a799c38d796d','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم فلامنكو المنطقة الثانية \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"30d550ac-cf60-40c6-895a-8dbb7cfa2528\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"2524\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2023, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"72000\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"72000\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('260cad31-9055-4546-9db5-a947f40e46c1','default','City has been created','App\\Models\\City','created','de4248d9-adb3-4350-b5c5-1f33cf920d38',NULL,NULL,'{\"attributes\": {\"name\": \"ابوسمبل السياحية\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('26202406-a1e9-4732-8688-d3dcdd14666a','default','City has been created','App\\Models\\City','created','e2b3ed89-ef68-4cbd-b74c-4dcbaa451e1d',NULL,NULL,'{\"attributes\": {\"name\": \"بني سويف الجديدة\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('2622b5c8-00eb-488c-94fe-95ef58b09d65','default','City has been created','App\\Models\\City','created','412f8d8f-7171-4acf-acd7-b326b9208d55',NULL,NULL,'{\"attributes\": {\"name\": \"سموحة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('2644215a-38a1-4331-ac02-e70fa61f3ed1','default','City has been created','App\\Models\\City','created','3dd6af34-ecb4-4ae0-a1fa-b6c40aed86c9',NULL,NULL,'{\"attributes\": {\"name\": \"العامرية\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('26a43d37-8f8d-4d7a-ab4f-b831591e9099','default','City has been created','App\\Models\\City','created','cc77ee3c-9b93-463f-a8cf-e1a86077ce01',NULL,NULL,'{\"attributes\": {\"name\": \"الساحل\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('26a8eb0a-f90b-4ea8-8aed-82e88df6a97a','default','City has been created','App\\Models\\City','created','64646179-74c5-42f7-bf35-11303eb4674a',NULL,NULL,'{\"attributes\": {\"name\": \"كفر الدوار\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('27977837-961e-4824-b637-5e64eedc723d','default','User has been updated','App\\Models\\User','updated','507e4996-9cd3-4732-8a24-a22b6035f03b','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"email\": \"ahmedahtef@gmail.com\"}, \"attributes\": {\"email\": \"ahmedatef@gmail.com\"}}',NULL,'2025-05-24 21:32:40','2025-05-24 21:32:40'),
('27b10999-283d-4ba8-8c2a-f7b2a8dca233','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"decision_image\": \"decision-images/riWfYkCAzDTq7fBqt6zWXmKPGE9G27Rex1kqK3bp.png\"}, \"attributes\": {\"decision_image\": \"decision-images/6HquXKzsOv1fzCyMkmEUadkkno8Wg1A2euWwrSl4.pdf\"}}',NULL,'2025-05-05 10:43:27','2025-05-05 10:43:27'),
('285321aa-dc55-48b8-9fcf-5f86d3624a25','default','City has been created','App\\Models\\City','created','e13b2b48-e8e9-48bc-99df-e7aef25f3f27',NULL,NULL,'{\"attributes\": {\"name\": \"أبو حماد\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('285ada43-2ff9-4f9e-aae5-7779e0390fac','default','City has been created','App\\Models\\City','created','58493cf5-770d-4d67-9b76-eccf339cd060',NULL,NULL,'{\"attributes\": {\"name\": \"النوبارية\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('28e3bbc4-8294-402e-b30f-94666cf40d63','default','Origin has been updated','App\\Models\\Origin','updated','c7450ead-7746-4f32-a04f-7f4bd11df995','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"created_by\": null, \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}, \"attributes\": {\"city_id\": \"776efd16-c76e-4d71-a29b-c7dc7343bb2b\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-05-04 12:59:07','2025-05-04 12:59:07'),
('290f51d4-16f0-4c66-8e75-7b82c4cf4541','default','City has been created','App\\Models\\City','created','c0709c6c-c5d5-4996-bb04-6137ab6ca224',NULL,NULL,'{\"attributes\": {\"name\": \"شبرا\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('291e3ac2-96d6-410b-adab-03ec27a31528','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"created_by\": null}, \"attributes\": {\"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\"}}',NULL,'2025-05-04 09:57:31','2025-05-04 09:57:31'),
('291ef49f-472b-4c36-a198-f0ea8f5166cc','default','DecisionType has been created','App\\Models\\DecisionType','created','c1ec4c22-b5a7-4901-94e6-72665d74dbcf','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"قرار محافظ \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('2924f967-6f98-4429-9552-523c80e572e9','default','OriginDetail has been created','App\\Models\\OriginDetail','created','80b5cd91-2a63-4195-9e6a-80366b47a310','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-07 08:18:01','2025-08-07 08:18:01'),
('298e9438-6174-40ae-b13a-0704f59fcac5','default','City has been created','App\\Models\\City','created','87438c7a-7760-435c-9b4b-8163c32f4d7e',NULL,NULL,'{\"attributes\": {\"name\": \"مصيف بلطيم\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('2b3d5a7c-5055-49ea-8d16-62b8bf5edf41','default','City has been created','App\\Models\\City','created','20ae17fe-c664-4649-a6fd-df9a485a9922',NULL,NULL,'{\"attributes\": {\"name\": \"تمي الأمديد\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('2b8e678d-ed70-4331-8251-7cec5f657b00','default','Responsibility has been created','App\\Models\\Responsibility','created','7b824021-4c4f-4446-bed0-84ce15f87c79',NULL,NULL,'{\"attributes\": {\"name\": \"التعديات\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('2bc2718f-0d37-4f75-ac0e-15e450165479','default','City has been created','App\\Models\\City','created','f0f5e813-8bdb-4421-a7dc-e8f1e8018ce0',NULL,NULL,'{\"attributes\": {\"name\": \"كامب شيزار\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('2bce53df-3db7-4dc2-9024-f39f6809292d','default','City has been created','App\\Models\\City','created','47aedab9-203a-4754-9b63-d4fdbfb3fd81',NULL,NULL,'{\"attributes\": {\"name\": \"المكس\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('2bfcbc03-7e1a-4550-892e-3a70e7f4c216','default','City has been created','App\\Models\\City','created','1d8f69a4-231d-433a-aadd-62ddc6b2d929',NULL,NULL,'{\"attributes\": {\"name\": \"بني عبيد\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('2c4f7572-70e9-4a87-b002-630b64506747','default','City has been created','App\\Models\\City','created','648152e0-33d1-47bb-b7f0-54d1428e1ec1',NULL,NULL,'{\"attributes\": {\"name\": \"الغردقة\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('2d067437-4518-4649-ada0-7735e405240e','default','City has been created','App\\Models\\City','created','02cb2778-9f03-4fa5-87c5-9ba26e843e0a',NULL,NULL,'{\"attributes\": {\"name\": \"الزمالك\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('2d07a94e-aebd-4903-aefd-24414c2efa2a','default','City has been created','App\\Models\\City','created','fc8d3840-c127-46ff-a230-cdd07440451d',NULL,NULL,'{\"attributes\": {\"name\": \"مارينا\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('2dd3cc9c-5868-42fd-8d49-7ef2eebfb3f7','default','Department has been created','App\\Models\\Department','created','7acca323-ad18-45ce-801e-05ec2075fb0c',NULL,NULL,'{\"attributes\": {\"name\": \"الاستثمار\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('2e0a3d8e-6ab0-4317-bf3b-055c38753199','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"location\": \"testtl\", \"created_by\": \"e28df551-c71f-4c6e-8d4f-27c75d870afa\"}, \"attributes\": {\"location\": \"testtll\", \"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\"}}',NULL,'2025-06-03 10:12:19','2025-06-03 10:12:19'),
('2e0d1c1a-cf94-4e75-af01-9ab162aa6019','default','City has been created','App\\Models\\City','created','87e1b0e0-3bb6-4dd4-92d8-7a480b09e99e',NULL,NULL,'{\"attributes\": {\"name\": \"رأس البر\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('2e515122-e946-4033-8ca8-241dc2a35951','default','City has been created','App\\Models\\City','created','bfa38bed-8367-41b5-8dc2-94c468896cc8',NULL,NULL,'{\"attributes\": {\"name\": \"ابو طشت\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('2e5a533d-2e72-456f-ac50-67ab6da9e423','default','City has been created','App\\Models\\City','created','1daac9ab-be15-4c9e-b096-99c28e25e638',NULL,NULL,'{\"attributes\": {\"name\": \"محرم بك\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('2e763ce5-f0df-4ebb-a14f-a8df47ea0ebe','default','OriginDetail has been created','App\\Models\\OriginDetail','created','bee2bea8-6746-4475-96c9-3eee34dde46f','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": 0, \"commercial_units\": 0, \"residential_units\": 5100, \"administrative_units\": 0, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-06 15:39:03','2025-08-06 15:39:03'),
('2f0b86c5-87d2-47ff-a0d0-2b972baf8a92','default','City has been created','App\\Models\\City','created','ab945899-9a5f-4969-bc58-599c4d77114c',NULL,NULL,'{\"attributes\": {\"name\": \"بركة السبع\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('2f11e1c6-7d56-4094-a226-1f76226b5e99','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"decision_image\": \"decision-images/PDqgKAODTA19SmSW5VZHXwgxTi40o6k07VNwqdkz.pdf\"}, \"attributes\": {\"decision_image\": \"decision-images/gMy7wE5HpiGk00pOYu1Poc4qk2eEyH3sxQMJD8Ig.png\"}}',NULL,'2025-05-05 12:39:39','2025-05-05 12:39:39'),
('2f59d18d-3e7c-426e-aaa2-a46c986dd507','default','City has been created','App\\Models\\City','created','c898a0d6-eafc-446d-ab60-0c421b6db0ec',NULL,NULL,'{\"attributes\": {\"name\": \"الشيخ زويد\", \"government_id\": \"fd597d05-e8ca-4c88-a270-dedf07e8bade\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('3043617c-24dc-4687-8711-1f483fb6e652','default','City has been created','App\\Models\\City','created','45e75f67-dbfd-4ace-88f6-c4f51ea52fbd',NULL,NULL,'{\"attributes\": {\"name\": \"بكوس\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('30fec926-2d2d-49c0-b308-a796b7736c7d','default','Origin has been updated','App\\Models\\Origin','updated','40e8dcfc-d87c-4958-aa4d-b17bb05110f3','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"96000\"}, \"attributes\": {\"coordinates\": [[[579403.5021999993, 3012039.0033000004], [579642.8423000001, 3012109.4447999997], [579718.7779000001, 3011849.2266], [579481.0365000011, 3011776.2970999996], [579403.5021999993, 3012039.0033000004]]], \"total_area_coords\": \"68027.787696351\"}}',NULL,'2025-05-29 12:58:43','2025-05-29 12:58:43'),
('313fd2e7-cc8e-4434-bf7b-ac39cb209544','default','City has been created','App\\Models\\City','created','7f520150-48a5-4ff4-a3c3-0a1afe2d585c',NULL,NULL,'{\"attributes\": {\"name\": \"سانت كاترين\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('319a9261-a30c-4886-a20a-c50d972bf68d','default','OriginDetail has been created','App\\Models\\OriginDetail','created','e2715701-7d9b-4c36-8fa7-c485280b7fdd','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": 0, \"commercial_units\": 0, \"residential_units\": 5100, \"administrative_units\": 0, \"number_of_buildings_executed\": 300}}',NULL,'2025-08-06 15:36:06','2025-08-06 15:36:06'),
('32502e5b-432a-4251-8ee9-3f3870c5c678','default','City has been created','App\\Models\\City','created','6e233bfc-cf0d-4146-b3dc-bf1a16c93bd5',NULL,NULL,'{\"attributes\": {\"name\": \"مطوبس\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('32a01b48-fede-40d0-a6c7-1f478d1eb6aa','default','City has been created','App\\Models\\City','created','ee481993-7ff2-4f3a-bdaf-b3facab38d95',NULL,NULL,'{\"attributes\": {\"name\": \"الدخيلة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('32de2a42-cd72-4ed0-99f3-4469a62df416','default','City has been created','App\\Models\\City','created','82ad610e-a2f0-46eb-a2a9-b43847b60995',NULL,NULL,'{\"attributes\": {\"name\": \"الجامعة\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('3394a145-d640-4ecc-9c8f-e17cf3d3eb95','default','Origin has been updated','App\\Models\\Origin','updated','d37f766e-6d40-4626-b592-b3b53b0188bd','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/aKZc9LEtBaCzDISri8bRpmghItCwOzxhKz5gynUP.pdf\"}}',NULL,'2025-05-04 13:02:05','2025-05-04 13:02:05'),
('33a48ab4-36e1-41a0-9d5e-c4d06ebf1fb8','default','City has been created','App\\Models\\City','created','247a40b6-1835-4819-91fc-71f10f201d7a',NULL,NULL,'{\"attributes\": {\"name\": \"بئر العبد\", \"government_id\": \"fd597d05-e8ca-4c88-a270-dedf07e8bade\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('33f3987c-cca0-4ebe-8ce3-6b00a47790cc','default','City has been created','App\\Models\\City','created','2f7aaa6a-4c97-4c08-9ac5-210afcb6d05c',NULL,NULL,'{\"attributes\": {\"name\": \"الوايلى\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('34477a90-d91e-48fa-9b37-6fce1daa76e0','default','Project has been created','App\\Models\\Project','created','716e0bae-b7f4-4f7b-baa7-4d40c76d9ab0','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 500 عمارة بتقسيم الحجاز منطقة أبوعشرة الطريق الدائري الأوسط  - الغردقة \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('34b46600-acad-4cda-95b7-5fad4e6e8592','default','City has been created','App\\Models\\City','created','c65b5218-7754-4d87-9aae-f5663d17e8a2',NULL,NULL,'{\"attributes\": {\"name\": \"روض الفرج\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('3503a882-0155-43a2-ac6a-a739c40b0cdf','default','Government has been created','App\\Models\\Government','created','eb94b50e-1cc5-45bc-bfed-39edd60acb33',NULL,NULL,'{\"attributes\": {\"name\": \"القليوبية\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('356d986c-a0de-4310-bdaa-a6d05f150140','default','City has been created','App\\Models\\City','created','0bec0ef3-771a-499e-b733-305bc9228743',NULL,NULL,'{\"attributes\": {\"name\": \"إيتاي البارود\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('35dd81ff-0d50-4eef-9a54-2c3c3f0c2b6c','default','Origin has been updated','App\\Models\\Origin','updated','183885e1-7681-42cf-a63c-99fecd470fa3','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"coordinated_by\": null, \"total_area_coords\": \"93900\"}, \"attributes\": {\"coordinates\": [[[3134506.9018999995, 508156.66639999975], [3134530.743799999, 508208.2569], [3134454.935500001, 508241.6443], [3134448.3357, 508222.66279999976], [3134333.524300003, 508284.93629999965], [3134325.6809000005, 508263.8981999999], [3134506.9018999995, 508156.66639999975]], [[3134381.4439999997, 508303.3544], [3134406.6244999995, 508294.42219999945], [3134412.4462, 508307.95449999993], [3134386.7908999985, 508318.69829999976], [3134381.4439999997, 508303.3544]], [[3134519.5139000006, 508278.6491000001], [3134524.9833, 508293.5568999999], [3134501.057499999, 508304.32359999965], [3134494.6872000005, 508288.5536], [3134519.5139000006, 508278.6491000001]], [[3134562.4027000004, 508395.2395000003], [3134567.009199999, 508408.54119999986], [3134542.9569000006, 508418.3842999999], [3134537.446999999, 508405.84110000025], [3134562.4027000004, 508395.2395000003]], [[3134516.0931, 508148.37729999993], [3134730.942600002, 508018.4630999998], [3134773.3055, 508121.7096000001], [3134545.481699999, 508213.6654999996], [3134516.0931, 508148.37729999993]], [[3134818.404200002, 508283.8257999998], [3134838.6160999984, 508338.0186000002], [3134852.3464999995, 508332.6704], [3134859.513900001, 508350.0327000003], [3134826.914499999, 508362.6939999999], [3134816.8395999996, 508337.6234], [3134776.595700001, 508353.71990000026], [3134756.5384999984, 508308.1964000001], [3134818.404200002, 508283.8257999998]], [[3135201.724, 508258.7198], [3135221.1208999995, 508307.4024999998], [3135169.5165999993, 508328.5241], [3135207.3050999995, 508424.3388], [3135165.384599999, 508439.9752999999], [3135130.4100000006, 508355.72439999995], [3134925.163099999, 508437.5586], [3134898.0842000013, 508367.6467999996], [3135201.724, 508258.7198]], [[3135373.590300002, 508580.7566000001], [3135409.5688999994, 508565.5680999997], [3135433.2295999997, 508613.0807], [3135480.7918, 508597.57030000014], [3135537.9789, 508740.3138], [3135496.1522000004, 508771.5622999998], [3135464.4607000006, 508754.14060000016], [3135446.1417, 508762.2339000004], [3135373.590300002, 508580.7566000001]], [[3135852.3269000016, 508382.82960000006], [3135851.462800001, 508538.02639999986], [3135826.109300001, 508539.4183999997], [3135786.2447, 508547.1118000002], [3135739.700800001, 508422.837], [3135852.3269000016, 508382.82960000006]]], \"coordinated_by\": \"94000ccb-1c41-432a-a716-8f1edfc98a19\", \"total_area_coords\": \"77355.9578065\"}}',NULL,'2025-06-02 12:27:35','2025-06-02 12:27:35'),
('36411de7-7e6c-4e9c-9fca-dc5dedd7e608','default','City has been created','App\\Models\\City','created','722498ec-4d5a-486f-a006-e3f64d59ff7f',NULL,NULL,'{\"attributes\": {\"name\": \"ابو قرقاص\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('36b365a1-7402-4fc8-8da6-eb2d80fa4a24','default','User has been created','App\\Models\\User','created','6f99322f-79bc-4cf4-86fb-2dd2330556a7','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"View\", \"email\": \"view@gmail.com\", \"status\": 1, \"password\": \"$2y$10$VmHgltKgv82NcaF32TOSHuvPNWPUVCWpYHi.yhYZjEpE2H0PUvab6\", \"job_title_id\": \"93569d07-a617-445b-8b76-1530a8504be4\", \"phone_number\": \"01122335656\", \"department_id\": \"d0212885-f294-43c8-9585-ac2f87861755\", \"national_number\": \"25323233632569\"}}',NULL,'2025-05-28 11:50:04','2025-05-28 11:50:04'),
('36f8f9cb-137d-47c5-a6b4-145d8dd383cd','default','City has been created','App\\Models\\City','created','197c7fe8-3cd5-4099-8f74-1e69c0724b22',NULL,NULL,'{\"attributes\": {\"name\": \"الشيخ زايد\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('3715bf74-f636-4508-9e9f-ea1ca61bcb49','default','OriginDetail has been created','App\\Models\\OriginDetail','created','0b137ec3-fcd5-4506-b532-1f1b2d7502b4','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc\", \"unit_area\": \"90.00\", \"number_of_units\": 300, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": null, \"administrative_units\": null, \"number_of_buildings_executed\": 15}}',NULL,'2025-08-06 16:09:22','2025-08-06 16:09:22'),
('3752ebd7-5e3f-4e35-88a7-6d5f6ca0dd2c','default','Origin has been updated','App\\Models\\Origin','updated','40e8dcfc-d87c-4958-aa4d-b17bb05110f3','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/IP1jPbi9yujgNVR8pZuB5yKl1pyhWGmEgnuGxKkB.pdf\"}}',NULL,'2025-05-04 13:09:02','2025-05-04 13:09:02'),
('37f2de29-59ea-4a10-8e1d-e8000c4c1e4b','default','City has been created','App\\Models\\City','created','028c1878-7897-482e-b825-551b767a79d2',NULL,NULL,'{\"attributes\": {\"name\": \"الأقصر\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('38079a65-90a7-453d-b2b8-c68301b3cace','default','User has been updated','App\\Models\\User','updated','94000ccb-1c41-432a-a716-8f1edfc98a19','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"job_title_id\": \"6da764d9-bf25-44df-af15-130d21f9024d\", \"department_id\": \"214f9847-9362-489b-9c60-3aa3ebac79a9\"}}',NULL,'2025-04-29 11:02:07','2025-04-29 11:02:07'),
('380926bd-597b-4ed1-b814-9ec7edf1889d','default','City has been created','App\\Models\\City','created','8cbf05bf-f92a-4d92-86f5-eafcd6884f60',NULL,NULL,'{\"attributes\": {\"name\": \"الانفوشى\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('386a6882-fae9-4300-b555-12cbcf59ebe4','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"old\": {\"location\": \"kjs,nhh5\"}, \"attributes\": {\"location\": \"kjs,nhh5jj\"}}',NULL,'2025-06-02 11:07:27','2025-06-02 11:07:27'),
('38754b45-aee4-489f-9a43-3f907730ee76','default','OriginDetail has been created','App\\Models\\OriginDetail','created','a096ab1d-d8b8-47c8-b5b0-f2f003593a03','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 5100, \"administrative_units\": null, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-06 15:49:15','2025-08-06 15:49:15'),
('3900802d-3d53-4638-8640-8802cc6c85e2','default','Project has been created','App\\Models\\Project','created','61455604-1ca5-4538-9f02-95468c2c85d3','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 1200 وحدة تقسيم فلامنكو المنطقة الثانية - القصير \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('39232de2-096b-4456-b295-eeb83797ed1e','default','City has been created','App\\Models\\City','created','a110b77e-0701-4975-99f1-58a526287b17',NULL,NULL,'{\"attributes\": {\"name\": \"بين السرايات\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('3986b83e-5f60-45f9-acc7-e85c6c65c7c5','default','City has been created','App\\Models\\City','created','91b42e25-9c62-4011-9a85-4693fb904b19',NULL,NULL,'{\"attributes\": {\"name\": \"أشمون\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('399c9939-e61a-4618-ac60-5275b72ac877','default','LockedOrigin has been created','App\\Models\\LockedOrigin','created','15a7773b-fe85-4617-b1d1-bc9f95b5a41f','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"origin_id\": \"f1adfec5-664d-4b68-8e46-7b05a438c5f4\"}}',NULL,'2025-06-02 06:52:20','2025-06-02 06:52:20'),
('39be993b-5dd1-4ac3-85a1-9cd1acc1876a','default','City has been created','App\\Models\\City','created','4f76361c-f454-4d88-b7ea-9547f657f0fa',NULL,NULL,'{\"attributes\": {\"name\": \"15 مايو\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('39d581af-8355-4b02-a222-c76ca242d6ff','default','City has been created','App\\Models\\City','created','665f8183-9981-4719-9aee-05961d4d474f',NULL,NULL,'{\"attributes\": {\"name\": \"القرين\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('3a1eca96-c07d-444e-bc66-901546728a2c','default','Department has been created','App\\Models\\Department','created','72bd59f9-a04e-414d-b668-c83fc9ab2b57',NULL,NULL,'{\"attributes\": {\"name\": \"المالية\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('3a352ee6-4cd8-4406-a868-3cc4ee4f51c2','default','City has been created','App\\Models\\City','created','86d5ee71-03bb-4637-a1c6-6155a38883c7',NULL,NULL,'{\"attributes\": {\"name\": \"كوم أمبو\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('3a7a4d37-05a9-43b9-8116-73fcd8d1bef8','default','Origin has been updated','App\\Models\\Origin','updated','133464b3-9283-4b66-89f7-a799c38d796d','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"revised_by\": null, \"origin_status\": \"inprogress\"}, \"attributes\": {\"revised_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\", \"origin_status\": \"revision\"}}',NULL,'2025-06-17 11:24:35','2025-06-17 11:24:35'),
('3aa61ee8-ee7c-4a55-bd45-ca3af46d7c9d','default','Origin has been updated','App\\Models\\Origin','updated','9b372dd0-c0c6-497b-8c7b-3592ab39182a','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/j82YSBOSfeFrINMg2J4xQC31MCSydlQo9SUXBpjb.pdf\"}}',NULL,'2025-05-04 13:24:54','2025-05-04 13:24:54'),
('3aff148e-91b4-4b5e-a4dc-4dd7d54675e2','default','Project has been updated','App\\Models\\Project','updated','2620cf73-50b0-49e2-9f8f-1c3bb68a3e9a','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"name\": \"تنفيذ عدد 80 عمارة بشارع الحجاز تقسيم البداري – الغردقة\"}, \"attributes\": {\"name\": \"تنفيذ عدد 64 عمارة بشارع الحجاز تقسيم البداري – الغردقة\"}}',NULL,'2025-06-17 11:07:04','2025-06-17 11:07:04'),
('3b0a7353-3ce6-46c4-9e4b-424335f88305','default','City has been created','App\\Models\\City','created','ad7cf88b-987a-40c3-ba79-c5e22e07f28f',NULL,NULL,'{\"attributes\": {\"name\": \"الدرب الاحمر\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('3b706a50-3789-4ee5-aabc-3ba4d43bd546','default','City has been created','App\\Models\\City','created','eae0428f-924c-49b9-ae9c-129254e71792',NULL,NULL,'{\"attributes\": {\"name\": \"ديروط\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('3bc1f4b8-55f0-43ee-a909-c38b6e086809','default','Government has been created','App\\Models\\Government','created','4775a4a6-101a-43b9-a5f5-4d0c60ded625',NULL,NULL,'{\"attributes\": {\"name\": \"بني سويف\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('3ce24f06-1597-4327-b185-3993ffc27454','default','City has been created','App\\Models\\City','created','164de6d6-9e04-41fe-b62e-a50dfa5217dc',NULL,NULL,'{\"attributes\": {\"name\": \"عزبة النخل\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('3dd46060-7da3-4884-ab7c-15dc9df96f65','default','TypeService has been created','App\\Models\\TypeService','created','d6e60b85-a4ce-4c13-ab60-67e7a21947ae','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"مخابز\"}}',NULL,'2025-08-17 12:18:13','2025-08-17 12:18:13'),
('3decc43d-0d1a-4838-bec7-6da94274af31','default','City has been created','App\\Models\\City','created','749d2090-081f-4b8c-bd59-9483bf9f0311',NULL,NULL,'{\"attributes\": {\"name\": \"أخميم\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('3e28152f-e99f-46a6-b8f7-f0e15d235808','default','City has been created','App\\Models\\City','created','f0637fc6-837d-4fa7-997d-bc5297be573e',NULL,NULL,'{\"attributes\": {\"name\": \"فرشوط\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('3e9e3651-8ca6-43ab-be2c-0b7cff5aa185','default','City has been created','App\\Models\\City','created','49af6cb4-599a-4822-8584-6ed2254bec2e',NULL,NULL,'{\"attributes\": {\"name\": \"قوص\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('3e9eae06-6c06-4c8c-9913-5fc98b9825b9','default','Origin has been updated','App\\Models\\Origin','updated','a19237b5-9d95-4e6d-ac97-80d6c372a4f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\"}, \"attributes\": {\"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\"}}',NULL,'2025-07-22 09:52:37','2025-07-22 09:52:37'),
('3fd9d0e2-2700-419d-9e19-f59127db9fe6','default','City has been created','App\\Models\\City','created','9c54b10d-4509-428f-91aa-68523270ec7f',NULL,NULL,'{\"attributes\": {\"name\": \"أبو تيج\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('3fe89e53-c5d1-4b66-9fd7-61d7d013cc47','default','City has been created','App\\Models\\City','created','bebda26b-25b8-4d48-bfba-6f6361111e0f',NULL,NULL,'{\"attributes\": {\"name\": \"الرياض\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('4013039a-4611-473a-a3a0-1d37cecea5d8','default','City has been created','App\\Models\\City','created','d282b457-fc6d-4ad4-b196-38ac84aa8219',NULL,NULL,'{\"attributes\": {\"name\": \"بدر\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('40793b62-7fa0-4e08-be08-baafe51faef8','default','Responsibility has been created','App\\Models\\Responsibility','created','d8617035-320a-4c13-93cd-d3206d582182','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"مشاهدة\"}}',NULL,'2025-05-28 11:49:14','2025-05-28 11:49:14'),
('4086a913-d46a-49f2-b3f2-2fa2990df3e5','default','City has been created','App\\Models\\City','created','5634bf96-dfdc-4341-8e7e-fef9bf9a0b0a',NULL,NULL,'{\"attributes\": {\"name\": \"بني مزار\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('41039ef3-b35b-47a5-9beb-649e125ac7e3','default','City has been created','App\\Models\\City','created','5e84e7cf-9dd9-457e-bbce-6b91fe36a0ea',NULL,NULL,'{\"attributes\": {\"name\": \"أطفيح\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('41052983-2209-43e0-a07e-260de685cac9','default','City has been created','App\\Models\\City','created','0ae0c985-07b8-4903-8ea3-119ae36d7a35',NULL,NULL,'{\"attributes\": {\"name\": \"أوسيم\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('41f81b85-1af3-42d4-a793-ad4797d58743','default','OriginDetail has been created','App\\Models\\OriginDetail','created','190a1229-f09b-4e44-a5f3-0f743fd0ecf2','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-06 15:49:32','2025-08-06 15:49:32'),
('42392f03-0aa0-4cf4-806e-a5759b5205ca','default','City has been created','App\\Models\\City','created','68ac49c1-6ddf-4b4b-851e-553773d05f62',NULL,NULL,'{\"attributes\": {\"name\": \"البصيلية\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('4272e634-a92d-489c-b163-06d8eb4c5f19','default','City has been created','App\\Models\\City','created','6064244c-97b4-4d6a-9acf-07193c94a8ef',NULL,NULL,'{\"attributes\": {\"name\": \"العدوة\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('4283728d-715b-4b6c-8a3b-771457efe99d','default','City has been created','App\\Models\\City','created','e1f0f54b-0687-4e09-af94-8109ebb195d5',NULL,NULL,'{\"attributes\": {\"name\": \"الحلمية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('42fd252e-3799-48c6-aa63-e0bd17249405','default','Responsibility has been created','App\\Models\\Responsibility','created','4ed5c430-758f-426e-b562-0b95802db272',NULL,NULL,'{\"attributes\": {\"name\": \"العقود\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('43c241dc-aa1d-46f3-af0f-bd0fcab8847f','default','Project has been created','App\\Models\\Project','created','8f7bd399-c11e-462c-aa8c-2ad7ec5ce065','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 300 عمارة بمنطقة تقسيم الحجاز أبوعشرة – الغردقة\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('449cb39e-5178-4bb2-a191-e1b36f03dc27','default','City has been created','App\\Models\\City','created','f217388e-da25-47f2-a7ea-03bdb081a99e',NULL,NULL,'{\"attributes\": {\"name\": \"الحرانية\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('4504315a-2dea-498f-86cf-074aa191ff31','default','Government has been created','App\\Models\\Government','created','63a6815e-8b5e-4d2b-9217-6764e8a14d19',NULL,NULL,'{\"attributes\": {\"name\": \"الدقهلية\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('454031da-c4b8-4a51-a59b-6dca6abf9976','default','City has been created','App\\Models\\City','created','f194e665-3e46-4272-b582-4fb53f900d87',NULL,NULL,'{\"attributes\": {\"name\": \"عزبة البرج\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('456bce85-b46b-4830-83e3-46194d24f9e1','default','City has been created','App\\Models\\City','created','b22c19ca-4404-498c-8e50-e5e3eee4a8e3',NULL,NULL,'{\"attributes\": {\"name\": \"فاقوس\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('45904c48-65ff-4692-966b-1697de3f5ef2','default','Government has been created','App\\Models\\Government','created','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c',NULL,NULL,'{\"attributes\": {\"name\": \"مطروح\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('468e1318-a6d4-482a-be3b-2dfba3816aeb','default','City has been created','App\\Models\\City','created','d2979b2b-8631-4fa3-86f5-3ebf6f1f90d0',NULL,NULL,'{\"attributes\": {\"name\": \"الزقازيق\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('46921300-997d-4c57-9eaa-233cfa8666ee','default','City has been created','App\\Models\\City','created','57b7243a-b077-4916-9e3c-26f8ff15947c',NULL,NULL,'{\"attributes\": {\"name\": \"السباعية\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('469c726d-d6fa-4ae7-a730-4e34300f104c','default','City has been created','App\\Models\\City','created','274dc7ac-e9c5-43ef-9830-71d7c6a943ab',NULL,NULL,'{\"attributes\": {\"name\": \"أسوان الجديدة\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('46a14dcd-71d9-4f5d-813e-fa89bdf3eaad','default','City has been created','App\\Models\\City','created','65636221-ba9a-4273-91dd-ba5274be0f0e',NULL,NULL,'{\"attributes\": {\"name\": \"الخصوص\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('47353a2f-9c2c-4612-a206-10e3040c4f14','default','City has been created','App\\Models\\City','created','705ace4b-99ab-42ad-b422-ea25d2ac736c',NULL,NULL,'{\"attributes\": {\"name\": \"البساتين\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('4778913d-79aa-4449-b4e8-e850fa78f3c7','default','DecisionType has been created','App\\Models\\DecisionType','created','1fc39eec-c714-4712-973a-fbc93733e7bc','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"رئيس مجلس الوزراء \"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('47a88761-aedf-490b-ae01-00f8f5c6cf2d','default','City has been created','App\\Models\\City','created','40724ce4-ede7-4e52-aa21-7485f1cb9687',NULL,NULL,'{\"attributes\": {\"name\": \"دهب\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('4846bb56-7f1d-46e5-b656-557dcf847259','default','City has been created','App\\Models\\City','created','73c1df29-3483-42b2-9549-891dd1e198c8',NULL,NULL,'{\"attributes\": {\"name\": \"الروضة\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('489279ee-4889-40ad-98c0-0178b307e0b8','default','City has been created','App\\Models\\City','created','fd2a5b1b-c039-4624-8d64-264ae2a1806b',NULL,NULL,'{\"attributes\": {\"name\": \"ملوي\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('489ff1f9-b446-4abd-9a54-cbba82a30fdb','default','JobTitle has been created','App\\Models\\JobTitle','created','6da764d9-bf25-44df-af15-130d21f9024d',NULL,NULL,'{\"attributes\": {\"name\": \"مراجع\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('4965cd95-8270-487a-a53d-a8aa06c6b595','default','City has been created','App\\Models\\City','created','5bfafbb6-d8ae-4e4f-9dc1-3605ad197947',NULL,NULL,'{\"attributes\": {\"name\": \"كفر صقر\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('498d3e04-89a2-4926-b86a-0a571058f675','default','City has been created','App\\Models\\City','created','f48418ba-3e76-4d42-bf11-dd3c9a3d5b3a',NULL,NULL,'{\"attributes\": {\"name\": \"منيا القمح\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('4aa99c50-afe7-4ba9-9eb1-e42fd312e9b7','default','City has been created','App\\Models\\City','created','2c510335-cfdc-495a-badb-6f4d83f476cb',NULL,NULL,'{\"attributes\": {\"name\": \"ساقلته\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('4b1d5da0-4e64-4b9d-8c08-d97818ef864d','default','City has been created','App\\Models\\City','created','ac722c94-8d08-4c12-a2c5-e6c3e3ed8c19',NULL,NULL,'{\"attributes\": {\"name\": \"البداري\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('4b78114e-46b7-4701-9239-efdca9bc98e5','default','Origin has been updated','App\\Models\\Origin','updated','7955112d-dbc7-4eb6-b1c9-e5b66b8c4b39','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"notes\": null}, \"attributes\": {\"notes\": \"مملوكة\"}}',NULL,'2025-05-06 09:50:08','2025-05-06 09:50:08'),
('4b94bfa7-a046-488f-8185-b2e713c5e016','default','City has been created','App\\Models\\City','created','583fdf06-b9b8-4c97-8f50-d6e1cf1860f8',NULL,NULL,'{\"attributes\": {\"name\": \"شبرا الخيمة\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('4be5bb21-cc07-4487-b120-0a5b98ef917c','default','City has been created','App\\Models\\City','created','d2ab8236-969d-4ee0-ad75-467e92f51fd8',NULL,NULL,'{\"attributes\": {\"name\": \"الباجور\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('4c159e98-4edf-45e1-946a-dfbb1bf00f3d','default','Project has been created','App\\Models\\Project','created','83ce4a2a-cb44-4763-9d74-9b220a285c16','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 50 عمارة سيف هيكل - الغردقة \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('4d4eea5f-73d6-4d35-944d-777c04d10623','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"origin_status\": \"inprogress\"}, \"attributes\": {\"origin_status\": \"revision\"}}',NULL,'2025-05-04 03:45:46','2025-05-04 03:45:46'),
('4d87f6c0-90c7-4331-85ec-d5a893d0dc6d','default','Statement has been created','App\\Models\\Statement','created','b95742fc-80c0-44d7-897c-88e52d11fc23','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"منحة إماراتية \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('4d966883-0b04-407e-846d-787d7858fe24','default','City has been created','App\\Models\\City','created','18d9cbfa-6dfc-4056-b7a7-9b0f5657fbd8',NULL,NULL,'{\"attributes\": {\"name\": \"ههيا\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('4e138cbc-256c-42a3-bc34-456319930586','default','Government has been created','App\\Models\\Government','created','2ff12ee0-3e7b-4cd6-84e0-894838774749',NULL,NULL,'{\"attributes\": {\"name\": \"كفر الشيخ\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('4e94aba8-03b2-4092-b6ca-fb8551947b3f','default','Government has been created','App\\Models\\Government','created','8397232a-163d-4a09-8e0c-9fa339e76497',NULL,NULL,'{\"attributes\": {\"name\": \"البحر الأحمر\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('4ea2e986-2453-4a78-bb23-04ab777109ba','default','City has been created','App\\Models\\City','created','a34f5118-1757-4a7f-b3bb-6fd138bd3a81',NULL,NULL,'{\"attributes\": {\"name\": \"دار السلام\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('4ed0f366-d1e0-4e2e-b9f5-bb948df5adcb','default','City has been created','App\\Models\\City','created','21172126-7355-4848-86d1-5b61a18cf7de',NULL,NULL,'{\"attributes\": {\"name\": \"حى الضواحى\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('4f82e22e-790a-443b-a501-cc307b164436','default','City has been created','App\\Models\\City','created','7b3bf15f-89e4-4d24-951a-e656546a1349',NULL,NULL,'{\"attributes\": {\"name\": \"الجناين\", \"government_id\": \"1a99feee-6a40-4988-a798-8c11978358df\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('4faa4cac-ae06-49ca-addd-e11a9abf9f75','default','Origin has been updated','App\\Models\\Origin','updated','9b372dd0-c0c6-497b-8c7b-3592ab39182a','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"sepated_services\": null}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\", \"sepated_services\": \"10 محلات + حضانة \"}}',NULL,'2025-08-06 16:02:24','2025-08-06 16:02:24'),
('5085249a-9a97-4318-b59a-20e32a6b6cf5','default','City has been created','App\\Models\\City','created','fb445afd-5f60-49ff-89f2-585abcb416c3',NULL,NULL,'{\"attributes\": {\"name\": \"شبين القناطر\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('508a36d4-bcb0-49af-93be-f36b54cdd0d0','default','City has been created','App\\Models\\City','created','ce6bb927-7a10-44bd-b472-5e61c0d04e95',NULL,NULL,'{\"attributes\": {\"name\": \"الخارجة\", \"government_id\": \"9d091593-1817-4565-9fe2-123eb626fc1d\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('50b5c908-7c31-4c61-9b72-57def52499c3','default','City has been created','App\\Models\\City','created','9faf46cb-0d83-4f64-8f09-ad64f7230d50',NULL,NULL,'{\"attributes\": {\"name\": \"مدينتي\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('51b18e4d-d1e4-4a7f-b46d-abc755776aa8','default','City has been created','App\\Models\\City','created','53e38bf4-aed0-4e58-89e1-2087bf0143fa',NULL,NULL,'{\"attributes\": {\"name\": \"السنبلاوين\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('51beec93-7b51-46f4-a0c4-6a93830ebce7','default','City has been created','App\\Models\\City','created','142798b3-38fa-4b59-a165-d73981d97498',NULL,NULL,'{\"attributes\": {\"name\": \"التل الكبير\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('521e0e36-dacc-4af3-bcb2-bab93e839f62','default','Responsibility has been created','App\\Models\\Responsibility','created','3de54b0b-862e-4c07-856a-31b6e4d0d535',NULL,NULL,'{\"attributes\": {\"name\": \"التحصيل\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('52c51def-a9f2-422a-a101-d2c08c95dfca','default','Origin has been updated','App\\Models\\Origin','updated','133464b3-9283-4b66-89f7-a799c38d796d','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"available_area\": \"0\", \"remaining_area\": \"0\", \"vacant_buildings\": \"0\"}, \"attributes\": {\"created_by\": \"94000ccb-1c41-432a-a716-8f1edfc98a19\", \"available_area\": \"72000\", \"remaining_area\": \"72000\", \"vacant_buildings\": \"60\"}}',NULL,'2025-06-17 07:42:05','2025-06-17 07:42:05'),
('53a41a5a-caa4-47f0-825b-c4d027b538f5','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"94000ccb-1c41-432a-a716-8f1edfc98a19\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"vacant_buildings\": \"62\"}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\", \"statement_id\": \"114e446a-71c7-4e79-a6d5-0ddf770b7a8d\", \"vacant_buildings\": \"46\"}}',NULL,'2025-06-16 07:46:21','2025-06-16 07:46:21'),
('54662142-439c-483e-9ee5-79a816ce9f45','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"city_id\": \"878f1e13-ff8d-4768-a2ea-f685c33e6c44\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-05-27 09:21:05','2025-05-27 09:21:05'),
('553290ce-7bfd-4163-95d2-81c2a410dbfd','default','Government has been created','App\\Models\\Government','created','03487283-f8b8-4fed-bb38-397798eb3601',NULL,NULL,'{\"attributes\": {\"name\": \"الجيزة\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('5567a76f-39e6-43e4-8083-2bc512c88a23','default','Origin has been updated','App\\Models\\Origin','updated','8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\"}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\"}}',NULL,'2025-08-06 16:09:22','2025-08-06 16:09:22'),
('55b3dc3c-5b60-4032-a18f-94621c9f288a','default','Origin has been created','App\\Models\\Origin','created','e66192ed-d4c4-4e6c-8a14-7d8308e4af8c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم الحجاز منطقة أبوعشرة الطريق الدائري \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"716e0bae-b7f4-4f7b-baa7-4d40c76d9ab0\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"568\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2021, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"610977\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"500\", \"total_area_coords\": \"910977\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"610977\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('55d6e824-97c9-45ad-94e7-b077526333ab','default','City has been created','App\\Models\\City','created','61ca0381-b3c8-4016-86b1-6929c7c39da2',NULL,NULL,'{\"attributes\": {\"name\": \"المنيل\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('56674254-71b8-489d-a951-13724f16a5c1','default','City has been created','App\\Models\\City','created','541aaee5-a6f1-4e6d-b214-b0f9fe0e80f7',NULL,NULL,'{\"attributes\": {\"name\": \"فايد\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('56e82262-07ab-49e2-b11b-2a4c30c10018','default','City has been created','App\\Models\\City','created','16569279-2cb6-415b-bbd6-77fa21f3b9d4',NULL,NULL,'{\"attributes\": {\"name\": \"باب الشعرية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('579f2d18-2686-4124-906f-1448d158aad9','default','OriginDetail has been created','App\\Models\\OriginDetail','created','769ea708-1e64-45ec-9e24-b38ed276cfae','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 360, \"commercial_shops\": 40, \"commercial_units\": 10, \"residential_units\": 360, \"administrative_units\": null, \"number_of_buildings_executed\": 18}}',NULL,'2025-08-07 08:22:12','2025-08-07 08:22:12'),
('58f30837-7757-44c7-8c05-00f3e73eeb79','default','City has been created','App\\Models\\City','created','1b398a37-706f-49e7-8850-c9d28f6d98ea',NULL,NULL,'{\"attributes\": {\"name\": \"اللبان\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('58fd83f2-7597-47ad-ad9c-c8468a9d1965','default','City has been created','App\\Models\\City','created','ef61973a-519f-4d97-b951-4d30cbbe73fc',NULL,NULL,'{\"attributes\": {\"name\": \"مينا البصل\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('590b85fa-6be3-491a-8ebe-8d3caeba933c','default','City has been created','App\\Models\\City','created','a32f5da2-ee62-4d63-99c6-3bf7b401e3a6',NULL,NULL,'{\"attributes\": {\"name\": \"الناصرية\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('596a41f3-1c6f-4f86-955c-b0f588f21e75','default','City has been created','App\\Models\\City','created','2bcf7680-35f7-41cf-97b7-bec1b320e4ff',NULL,NULL,'{\"attributes\": {\"name\": \"الواحات البحرية\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('5a230442-3d8f-4143-aa94-af4a201ff4c2','default','OriginDetail has been created','App\\Models\\OriginDetail','created','f04c8813-c044-4493-ae2a-8b6fb553c892','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 5100, \"administrative_units\": null, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-06 15:49:32','2025-08-06 15:49:32'),
('5b7b66e2-b5a1-45ef-9af8-c41f1c486b86','default','City has been created','App\\Models\\City','created','fc4fa9b6-b55c-4cbe-aeb3-3d47c1e11b92',NULL,NULL,'{\"attributes\": {\"name\": \"العتبة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('5b803cc5-3123-4942-8621-00a48adb5f37','default','City has been created','App\\Models\\City','created','9e6c4764-7392-4149-8ff2-c992f412b78b',NULL,NULL,'{\"attributes\": {\"name\": \"دشنا\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('5bce16fd-344b-4f04-8335-8529ee97a615','default','User has been created','App\\Models\\User','created','e28df551-c71f-4c6e-8d4f-27c75d870afa',NULL,NULL,'{\"attributes\": {\"name\": \"صابر إمام حسن\", \"email\": \"semam@gmail.com\", \"status\": 1, \"password\": \"$2y$10$yfHDCjs.3Ysj7edhTjBU7.B1S1x103rbG8vM0LgX2BM7GXT1XUkdu\", \"job_title_id\": null, \"phone_number\": \"01005015476\", \"department_id\": null, \"national_number\": \"27305200101798\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('5c2759fc-cca7-4fe1-8fef-ac36fc70fc46','default','City has been created','App\\Models\\City','created','c1bd9c97-ec0a-4ce0-a08d-294ca5f6fea6',NULL,NULL,'{\"attributes\": {\"name\": \"العمرانية\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('5c9867b8-5670-4bfa-aeba-5a436cb9b233','default','User has been updated','App\\Models\\User','updated','e28df551-c71f-4c6e-8d4f-27c75d870afa','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"email\": \"semam@gmail.com\"}, \"attributes\": {\"email\": \"semam@mff.gov.eg\"}}',NULL,'2025-06-02 10:56:41','2025-06-02 10:56:41'),
('5ca88464-1ce8-4236-91e0-f46a1bc55a32','default','Project has been created','App\\Models\\Project','created','d5789031-9704-4f5a-9928-b13491d9dbe5','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"مقر شالية مارينا 1\"}}',NULL,'2025-05-06 09:37:07','2025-05-06 09:37:07'),
('5caf95e3-fa86-4a20-a264-023d619d4b8f','default','JobTitle has been created','App\\Models\\JobTitle','created','93569d07-a617-445b-8b76-1530a8504be4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"مشاهد\"}}',NULL,'2025-05-28 11:49:39','2025-05-28 11:49:39'),
('5d7be824-074b-4229-9566-52c3c0595d4a','default','Project has been created','App\\Models\\Project','created','db4ad9ea-a154-468a-a448-da91411e6956','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"مقر شالية بروتو مارينا 3 غرف وصالة\"}}',NULL,'2025-05-06 09:37:40','2025-05-06 09:37:40'),
('5d7ef731-e360-4ee7-99e0-93794bcb3094','default','Origin has been created','App\\Models\\Origin','created','41ac0cca-b929-4e28-9013-f38b51538677','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"2e13f5e6-db0a-4917-af2f-cbe114ca966e\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"223512.65\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"108\", \"total_area_coords\": \"223512.65\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"223512.65\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('5d8beec2-3c13-4fad-abc8-713600c029fe','default','City has been created','App\\Models\\City','created','98354d31-5024-478d-8a7c-697e0049e185',NULL,NULL,'{\"attributes\": {\"name\": \"كفر سعد\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('5d9cd29d-3571-4d18-aa67-cef0e9aa66a1','default','Origin has been updated','App\\Models\\Origin','updated','f2ec34d9-9cee-4318-b24f-e48f54101436','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"created_by\": null}, \"attributes\": {\"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\"}}',NULL,'2025-05-04 03:30:48','2025-05-04 03:30:48'),
('5df3bc19-c08f-4f87-930d-5a5b3a79ffef','default','OriginDetail has been created','App\\Models\\OriginDetail','created','0bbb4a7a-2f2c-4fd4-90be-6ff6260810b2','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-06 15:49:15','2025-08-06 15:49:15'),
('5e7c79b5-3ef4-4ef4-8012-b9a6baca8dfe','default','City has been created','App\\Models\\City','created','218cb0cd-dd10-4423-a74c-de073874ba97',NULL,NULL,'{\"attributes\": {\"name\": \"كفر شكر\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5e9dc17a-ebdb-4f52-8ac8-4f31e8d9de58','default','Statement has been created','App\\Models\\Statement','created','bae76f11-3713-4690-b9e7-5cfd27d252f8','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"الجهاز المركزي للتعمير \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('5f0cc618-267a-44c2-b191-90e050717625','default','City has been created','App\\Models\\City','created','c4ce47ad-f470-4be6-a097-b995de8346bf',NULL,NULL,'{\"attributes\": {\"name\": \"دسوق\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('5f3c9a49-8771-4005-8d83-55d909cd47b9','default','City has been created','App\\Models\\City','created','40d4ea26-662a-4d69-88b5-0a257f456574',NULL,NULL,'{\"attributes\": {\"name\": \"بنها\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5f7fbad7-186d-45c8-b43b-8d7b4875c351','default','City has been created','App\\Models\\City','created','4165167c-250a-49a6-a2ee-003e328f31f3',NULL,NULL,'{\"attributes\": {\"name\": \"المطرية\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('5ff45c38-fca8-41e3-96b2-60df2d70b3ed','default','City has been created','App\\Models\\City','created','e56df29f-f5c0-4a48-90c2-7763deac6f47',NULL,NULL,'{\"attributes\": {\"name\": \"الجمرك\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('60e14eae-467f-46ad-8d99-1a65ab926f9a','default','User has been created','App\\Models\\User','created','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,'{\"attributes\": {\"name\": \"عبد الحميد محمد\", \"email\": \"abdelhamedmohamed@gmail.com\", \"status\": 1, \"password\": \"$2y$10$87p4GzesKEeipMCZasEPOOrhoFaNt8757a.9av3h5MBNARGuLpZLG\", \"job_title_id\": null, \"phone_number\": \"01008715259\", \"department_id\": null, \"national_number\": \"28501012702471\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('61072e45-0fdd-47df-9d9f-2ea06eaa8865','default','City has been created','App\\Models\\City','created','724c0d39-c7cc-45e4-8d6f-fa959de76e15',NULL,NULL,'{\"attributes\": {\"name\": \"السيالة\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('6184bb5e-cae7-48ab-8c20-57f473d01840','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"18\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"11000\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"used_area\": \"11000\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"18\"}}',NULL,'2025-05-04 12:40:11','2025-05-04 12:40:11'),
('619b06d0-38da-4411-9d68-9259fed853b8','default','City has been created','App\\Models\\City','created','8ab6df07-d0fa-41fe-a8c2-5ed67ea86224',NULL,NULL,'{\"attributes\": {\"name\": \"رشيد\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('634f6218-ccfd-49fb-9b21-93ff2ea92b21','default','OriginDetail has been created','App\\Models\\OriginDetail','created','efe9f0ac-f4d0-497a-b8e8-fd2d7f826dc3','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"183885e1-7681-42cf-a63c-99fecd470fa3\", \"unit_area\": \"90.00\", \"number_of_units\": 808, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 808, \"administrative_units\": null, \"number_of_buildings_executed\": 54}}',NULL,'2025-08-06 16:15:53','2025-08-06 16:15:53'),
('63ce1cd3-fb89-4bf7-aebb-895ae1cc43d9','default','City has been created','App\\Models\\City','created','d13b061d-4139-4d53-8c88-9ca25a03719f',NULL,NULL,'{\"attributes\": {\"name\": \"امبروزو\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('6449106e-22da-486e-b828-e8c34b5245d3','default','City has been created','App\\Models\\City','created','557a5adb-cf57-48e8-9f71-32217a4544e3',NULL,NULL,'{\"attributes\": {\"name\": \"الرديسية\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('64bda3c1-f1e4-4eb6-b750-ed9b976725c6','default','Government has been created','App\\Models\\Government','created','6b9fa5d5-e506-48b8-8538-71aed7f74808',NULL,NULL,'{\"attributes\": {\"name\": \"الشرقية\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('64e4d09c-562c-406b-89a0-cbf301397551','default','City has been created','App\\Models\\City','created','a8300a0d-34a8-4474-aaeb-306ae9f9b6ce',NULL,NULL,'{\"attributes\": {\"name\": \"المنيا الجديدة\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('65ad5f07-436f-43c5-bdaf-cc99436aa2e7','default','Origin has been updated','App\\Models\\Origin','updated','8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/l23J7p5HvakDXbY1Hrc8vtzTyREvcBvUJ1zTcFTA.pdf\"}}',NULL,'2025-05-04 13:10:54','2025-05-04 13:10:54'),
('65e082f7-e89d-4aaf-a12b-fc9a134a2646','default','City has been created','App\\Models\\City','created','6082f813-8eb4-48dd-9ac6-433f06904979',NULL,NULL,'{\"attributes\": {\"name\": \"جرجا\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('66532ce7-ea44-40cc-9dbd-499ca924869e','default','Origin has been updated','App\\Models\\Origin','updated','133464b3-9283-4b66-89f7-a799c38d796d','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/zxhsWterNvAGmaMEkwnV77ONvsxqhE3vGOyxtjmL.pdf\"}}',NULL,'2025-05-04 13:24:39','2025-05-04 13:24:39'),
('66940b11-50a1-4822-bd18-5e7f250cc856','default','City has been created','App\\Models\\City','created','8fd1aa5d-a4e6-4def-91dc-75bc668c6a10',NULL,NULL,'{\"attributes\": {\"name\": \"الجيزة\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('66ab2649-abe1-41be-af69-74387a5b62ee','default','City has been created','App\\Models\\City','created','e7815fb3-9040-4a7d-a7d5-a2f3eb736442',NULL,NULL,'{\"attributes\": {\"name\": \"مرسى مطروح\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('66d23372-d523-4fba-8fe4-1517a40d8cb2','default','City has been created','App\\Models\\City','created','bacbfff9-6722-4e24-9956-abca8707df85',NULL,NULL,'{\"attributes\": {\"name\": \"طوخ\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('66e3f3bd-8b9f-4f17-8b7b-5edd761aa951','default','City has been created','App\\Models\\City','created','91782eba-27f5-4505-92b4-7b67e633e0ef',NULL,NULL,'{\"attributes\": {\"name\": \"حى الشرق\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('66f3dec6-5e75-46e3-9d6a-fac876512630','default','City has been created','App\\Models\\City','created','1373ac26-638d-403c-996e-27498de80232',NULL,NULL,'{\"attributes\": {\"name\": \"الزرقا\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('674045d4-9037-4807-9b93-ca97a62d53fc','default','User has been created','App\\Models\\User','created','1a21e4dd-be52-4b40-b2d6-e73c17f28824',NULL,NULL,'{\"attributes\": {\"name\": \"مارى عادل عبده\", \"email\": \"maryadel@gmail.com\", \"status\": 1, \"password\": \"$2y$10$dQXxLYCN52BCho9OneJG5.ZDAqfJKRVzyECDFuCSy6YCO5aebPyYG\", \"job_title_id\": null, \"phone_number\": \"01007429191\", \"department_id\": null, \"national_number\": \"29305302101625\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('675a5e9b-97e6-46d9-bdd3-e046b1f7137c','default','City has been created','App\\Models\\City','created','748e1988-3020-4c13-b0e9-a9186e52e251',NULL,NULL,'{\"attributes\": {\"name\": \"بولكلي\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('67ae6fb6-eb3c-4cfd-9bb6-74a615b31f50','default','City has been created','App\\Models\\City','created','7f92e367-1e50-44c6-85de-c9e6c359d307',NULL,NULL,'{\"attributes\": {\"name\": \"القنطرة غرب\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('67f4693c-896a-4b69-a6ab-51a0ccb41484','default','User has been updated','App\\Models\\User','updated','94000ccb-1c41-432a-a716-8f1edfc98a19','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": \"6da764d9-bf25-44df-af15-130d21f9024d\"}, \"attributes\": {\"job_title_id\": \"c969eed4-c2f2-4b5e-a831-d4e6208c5f84\"}}',NULL,'2025-05-24 21:30:06','2025-05-24 21:30:06'),
('67fecff3-a12e-4a8a-9668-0995f683c5c0','default','City has been created','App\\Models\\City','created','1c780b66-0121-4571-83df-9711415d87c3',NULL,NULL,'{\"attributes\": {\"name\": \"ميت سلسيل\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('682f8388-742e-494c-b8e7-429cd1424211','default','City has been created','App\\Models\\City','created','912938ba-214c-468d-a77d-47aa3f8c30ce',NULL,NULL,'{\"attributes\": {\"name\": \"سنورس\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('684e045e-9def-4ac3-8f4c-e3f1f68fae2a','default','Responsibility has been created','App\\Models\\Responsibility','created','e3f01ed3-1249-46bc-864a-71a9d761e799',NULL,NULL,'{\"attributes\": {\"name\": \"رئيس فريق العمل\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('68c60ca2-4fa6-4231-b797-d52acbd3da6c','default','City has been created','App\\Models\\City','created','dffa2a20-7953-4160-9778-b493533d4ee3',NULL,NULL,'{\"attributes\": {\"name\": \"الحامول\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('694d18ff-a8f5-433d-9457-e73f15e6dcdb','default','City has been created','App\\Models\\City','created','4a9e74a4-fe04-401e-b0ee-a3d93cf48300',NULL,NULL,'{\"attributes\": {\"name\": \"شدس\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('6a049eb0-374d-4162-9b33-8fed43770cec','default','City has been created','App\\Models\\City','created','f782755b-7fb5-44fe-a527-eca42a954826',NULL,NULL,'{\"attributes\": {\"name\": \"الحسنة\", \"government_id\": \"fd597d05-e8ca-4c88-a270-dedf07e8bade\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('6a26fdfe-0999-4926-8bad-16160cde7c4d','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"sepated_services\": null}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\", \"sepated_services\": \"مول تجاري + حضانة + محلات تجارية \"}}',NULL,'2025-08-06 16:00:52','2025-08-06 16:00:52'),
('6ab63a5c-7b17-4d70-bc68-61cbff249b95','default','City has been created','App\\Models\\City','created','a1794741-b825-4194-83a4-73183cd8d18e',NULL,NULL,'{\"attributes\": {\"name\": \"تلا\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('6af5f020-4af3-4109-a75c-1c3ad3a425c5','default','Government has been created','App\\Models\\Government','created','31d94058-9f3a-4214-9f43-83976d66ade4',NULL,NULL,'{\"attributes\": {\"name\": \"البحيرة\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('6b5ede19-9481-4a9a-b337-962118940bd6','default','Origin has been updated','App\\Models\\Origin','updated','a19237b5-9d95-4e6d-ac97-80d6c372a4f4','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/tn2XZzbZyKqKmPwpENOVw6mg4R2OPjmEzqVCPG8Z.pdf\"}}',NULL,'2025-05-04 13:02:32','2025-05-04 13:02:32'),
('6b86e63b-281f-49a7-a2a0-7b82c2844ece','default','City has been created','App\\Models\\City','created','b291c7fd-4431-4dbd-b457-2b0989fff2f1',NULL,NULL,'{\"attributes\": {\"name\": \"صفط اللبن\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('6c5dfd7b-c236-484f-bd32-8c3d4a6c5b30','default','Origin has been created','App\\Models\\Origin','created','4ef65aab-021e-4791-a608-d3bac1c12e9c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي \", \"used_area\": \"0\", \"project_id\": \"f03430e9-947b-46e2-bb6f-3bf1cb8ea534\", \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"223512.65\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"108\", \"total_area_coords\": \"223512.65\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"223512.65\"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('6c8f196e-e7b4-4be2-b507-42a9befac072','default','User has been updated','App\\Models\\User','updated','1a21e4dd-be52-4b40-b2d6-e73c17f28824','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"job_title_id\": \"6da764d9-bf25-44df-af15-130d21f9024d\", \"department_id\": \"40dd2d94-04ee-487d-8dad-ed3b21245d6a\"}}',NULL,'2025-04-29 11:00:35','2025-04-29 11:00:35'),
('6d43fb15-cfd4-47a1-9f53-1781577c0c15','default','OriginDetail has been created','App\\Models\\OriginDetail','created','d35ef01b-fa06-4e15-b747-5619fbfd002c','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"34f0e90c-c6e9-4f64-917b-0a7200cefee5\", \"unit_area\": \"90.00\", \"number_of_units\": 2520, \"commercial_shops\": 18, \"commercial_units\": 12, \"residential_units\": 2504, \"administrative_units\": null, \"number_of_buildings_executed\": 126}}',NULL,'2025-08-06 16:15:01','2025-08-06 16:15:01'),
('6db064c9-c28c-4c9a-9ed7-003af892d2e7','default','City has been created','App\\Models\\City','created','0d123232-9495-4baf-a733-27c92b104342',NULL,NULL,'{\"attributes\": {\"name\": \"الجمالية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('6e70b8f0-e080-4bcc-97e3-bb83a38dd351','default','City has been created','App\\Models\\City','created','0189e713-5b50-43e3-b210-4659d6041c5a',NULL,NULL,'{\"attributes\": {\"name\": \"قطور\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('6e9fae1b-9447-4ed8-90af-cb8f207d27d1','default','Project has been created','App\\Models\\Project','created','5d2fdb65-6f23-4453-bb6a-61f035f44056','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 300 عمارة بمنطقة تقسيم الحجاز أبوعشرة - الغردقة \"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('6eb25744-0d3d-448d-8665-5d222ec2e218','default','Origin has been updated','App\\Models\\Origin','updated','0fcbcbd8-1c21-4799-ad3a-e02975839dd6','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\"}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\"}}',NULL,'2025-08-06 16:16:46','2025-08-06 16:16:46'),
('6ec6314f-49c3-4a4f-97cf-e40a79817d51','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000004, 3013733.4079999984]], \"total_area_coords\": \"135995.60650346\"}, \"attributes\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999975]], \"total_area_coords\": \"135995.60650332\"}}',NULL,'2025-05-27 09:48:35','2025-05-27 09:48:35'),
('6f16bd50-d720-4afa-bbff-b923dd68c9bc','default','Origin has been created','App\\Models\\Origin','created','60cb549f-7749-4a76-9a00-bad9572ff5bd','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم فلامنكو المنطقة الثانية \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"30d550ac-cf60-40c6-895a-8dbb7cfa2528\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"2524\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2023, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"72000\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"72000\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('6f3b2f3c-a5cb-4cbd-a02f-6ac11effa860','default','City has been created','App\\Models\\City','created','d4826dea-40af-4f4a-a5f7-df3a00f870d8',NULL,NULL,'{\"attributes\": {\"name\": \"الحوامدية\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('6fbfdd17-7abe-4829-a3e8-46d5b0267e58','default','Department has been created','App\\Models\\Department','created','b944d8a7-e6b8-4c5e-8275-bcb5fcd35c4e',NULL,NULL,'{\"attributes\": {\"name\": \"البحوث\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('7062423b-8706-4927-94f6-6ec183a7c4c8','default','City has been created','App\\Models\\City','created','43d5f2d9-0694-42df-97a2-483e49854ed3',NULL,NULL,'{\"attributes\": {\"name\": \"نجع حمادي\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('70bc9ad9-fc04-4ac2-80fe-9dc0d9721176','default','City has been created','App\\Models\\City','created','12743245-02ee-480f-a79c-bb2426b7da96',NULL,NULL,'{\"attributes\": {\"name\": \"كفر الشيخ\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('70d0c794-9be5-4c25-95a2-2aaffdea6004','default','City has been created','App\\Models\\City','created','39efd5b0-a625-4bd2-97dd-5374f36925ca',NULL,NULL,'{\"attributes\": {\"name\": \"جاردن سيتى\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('7161c119-26e5-4867-b318-31187ef2c3b5','default','City has been created','App\\Models\\City','created','34adc04c-d8e5-40fa-bb2b-88e3d974ed35',NULL,NULL,'{\"attributes\": {\"name\": \"جمصة\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('719bef37-e3a2-46e4-b4c7-4d20a196846e','default','Origin has been created','App\\Models\\Origin','created','45318d0e-a020-4859-bf6b-eff3220ae2da','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"notes\": \"مملوكة\", \"city_id\": \"28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363\", \"location\": \"شالية رقم (309) الدور الثالث فوق الأرضي\", \"used_area\": \"132\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"project_id\": \"db4ad9ea-a154-468a-a448-da91411e6956\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"0\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"decision_date\": 2020, \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"accept\", \"decision_type_id\": \"29887624-b6dd-4630-900f-a1f73d1e80c8\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"132\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"132\"}}',NULL,'2025-05-06 09:46:45','2025-05-06 09:46:45'),
('72313f67-2da5-4970-998b-72bb87f0f71e','default','City has been created','App\\Models\\City','created','6f99724d-fe27-4e42-a253-d287dd81af52',NULL,NULL,'{\"attributes\": {\"name\": \"طامية\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('72c13cdb-3713-4189-9a1a-9cba3c2b5308','default','Statement has been created','App\\Models\\Statement','created','114e446a-71c7-4e79-a6d5-0ddf770b7a8d','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"الجهاز المركزي للتعمير - مديرية الإسكان والمرافق بمحافظة البحر الأحمر \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('72ca7f88-1453-4d4c-af2c-4ef55c65ea2b','default','Responsibility has been created','App\\Models\\Responsibility','created','68489d39-0dcc-4008-b665-ad1fccde387f',NULL,NULL,'{\"attributes\": {\"name\": \"بيانات الملكية\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('72f50ee1-8616-41d5-81b7-154edcec5f61','default','Origin has been created','App\\Models\\Origin','created','183885e1-7681-42cf-a63c-99fecd470fa3','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم دمج جميع المناطق \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"منطقة غرب شارع الإذاعة \", \"used_area\": \"85\", \"created_by\": null, \"project_id\": \"553484be-28ca-4097-9cac-3c210a3e4f18\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"867\", \"statement_id\": \"114e446a-71c7-4e79-a6d5-0ddf770b7a8d\", \"decision_date\": 2012, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"93900\", \"executing_entity_num\": \"93900\", \"total_area_allocated\": \"93900\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('72fa2c64-a7a0-4cbf-81f0-44fc2b8db212','default','City has been created','App\\Models\\City','created','76dfee99-a66d-41a9-9bd1-fd5ab6304560',NULL,NULL,'{\"attributes\": {\"name\": \"كرموز\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('736f7759-155e-42d8-ae3d-3426a2200e44','default','City has been created','App\\Models\\City','created','ad66754a-fc56-45b9-bab7-a487f90b0c9e',NULL,NULL,'{\"attributes\": {\"name\": \"أرمنت\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('737dfe2e-a051-4626-bac8-8a8d6997f4f5','default','EditRequestOrigin has been created','App\\Models\\EditRequestOrigin','created','40141f29-e8c3-4eaa-a1ca-a7321f87b14b','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"status\": \"pending\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"origin_id\": \"f1adfec5-664d-4b68-8e46-7b05a438c5f4\"}}',NULL,'2025-06-02 06:52:55','2025-06-02 06:52:55'),
('73f32b35-cc22-4a7b-a1f3-96c5a9e702ae','default','Government has been created','App\\Models\\Government','created','9d091593-1817-4565-9fe2-123eb626fc1d',NULL,NULL,'{\"attributes\": {\"name\": \"الوادي الجديد\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('740e87e3-abec-4032-89b8-7c9494781ff0','default','City has been created','App\\Models\\City','created','6d444935-22b5-4d1a-8965-3879c7ec4850',NULL,NULL,'{\"attributes\": {\"name\": \"طابا\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('7455afc7-b79b-4653-a021-06e8ec4665cb','default','Origin has been created','App\\Models\\Origin','created','f7749517-9435-4661-8752-166aba77978f','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"منطقة الأحياء بجوار بيتكو \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"e768b283-ce53-40bc-a80d-c77331ce8191\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"131895.64\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"excellent\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"62\", \"total_area_coords\": \"131895.64\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"131895.64\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('74674f31-5f9b-4631-83b5-5c5b4eb5630e','default','Project has been created','App\\Models\\Project','created','83b33fa5-dce6-485f-b0ee-b3ad9f85ab12','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 14 عمارة التقسيم الحضري - مرسى علم \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('748aede8-91cc-40c9-ab74-47f9884f6172','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/riWfYkCAzDTq7fBqt6zWXmKPGE9G27Rex1kqK3bp.png\"}}',NULL,'2025-05-05 10:38:07','2025-05-05 10:38:07'),
('74cb91a8-d2e9-4396-b87b-757a6ff3a4fe','default','City has been created','App\\Models\\City','created','2fcc1d63-64b2-4579-8cda-98060db83fef',NULL,NULL,'{\"attributes\": {\"name\": \"مارينا\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('74fc5bfd-5255-44b8-8d76-4cdc5456a525','default','City has been created','App\\Models\\City','created','49c7474b-8115-43ee-90ae-886a4ccae8a3',NULL,NULL,'{\"attributes\": {\"name\": \"الحمام\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('766a3900-7a13-4044-a3c7-a62fdb7174af','default','City has been created','App\\Models\\City','created','22cff895-4481-440d-98d4-17a2e14d7a8d',NULL,NULL,'{\"attributes\": {\"name\": \"سيدي كرير\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('773d67fb-32fb-445b-a82d-231787a025bb','default','User has been created','App\\Models\\User','created','94000ccb-1c41-432a-a716-8f1edfc98a19',NULL,NULL,'{\"attributes\": {\"name\": \"عماد كمال\", \"email\": \"emadkamal@gmail.com\", \"status\": 1, \"password\": \"$2y$10$57.TDEaQw1Kw14VLuhFZ.O4mBdmXvRF3g3UBvFcws5hP0/UqPR/vK\", \"job_title_id\": null, \"phone_number\": \"01012265196\", \"department_id\": null, \"national_number\": \"29006012606611\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('7746e93f-ba2a-4d7b-8b79-b8cb490247ce','default','OriginDetail has been created','App\\Models\\OriginDetail','created','30d8008c-a82f-421a-beec-1c91f626258b','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 920, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 920, \"administrative_units\": null, \"number_of_buildings_executed\": 46}}',NULL,'2025-08-06 15:48:55','2025-08-06 15:48:55'),
('7819a39b-cb48-4f6e-9ecd-7189096f8a6a','default','City has been created','App\\Models\\City','created','65aa9b46-45d8-4a14-b155-4dd0d453940b',NULL,NULL,'{\"attributes\": {\"name\": \"العاصمة الإدارية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('784e4dd4-012c-41a6-902e-db725727d8c4','default','City has been created','App\\Models\\City','created','e0c9dd96-bfdf-4ca3-bee8-e7f9d5ba33d6',NULL,NULL,'{\"attributes\": {\"name\": \"إدكو\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7854d492-2be2-46c1-b9b4-07ba5a78923e','default','Origin has been created','App\\Models\\Origin','created','d597f2fb-9c5a-4e96-86d7-2be72b95ce6c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم دمج جميع المناطق \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"منطقة غرب شارع الإذاعة \", \"used_area\": \"85\", \"created_by\": null, \"project_id\": \"553484be-28ca-4097-9cac-3c210a3e4f18\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"867\", \"statement_id\": \"114e446a-71c7-4e79-a6d5-0ddf770b7a8d\", \"decision_date\": 2012, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"93900\", \"executing_entity_num\": \"93900\", \"total_area_allocated\": \"93900\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('78b77f18-cc4d-4ea9-b33f-9dce6bcfe5c0','default','Origin has been updated','App\\Models\\Origin','updated','a19237b5-9d95-4e6d-ac97-80d6c372a4f4','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"created_by\": null, \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"location_status\": \"good\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"location_status\": \"very_good\"}}',NULL,'2025-05-04 12:42:02','2025-05-04 12:42:02'),
('7907f1da-dff4-4986-b5c5-23f5dfb01bfb','default','City has been created','App\\Models\\City','created','1ed90df6-a885-450f-be3f-2bd7f9a8f5b4',NULL,NULL,'{\"attributes\": {\"name\": \"منشأة أبو عمر\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('791d8ec0-06af-4c8b-bfd0-9d8a7ed5e350','default','City has been created','App\\Models\\City','created','117882bf-f80d-471c-8329-d6e261ed4988',NULL,NULL,'{\"attributes\": {\"name\": \"ميت غمر\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('793b4dde-ba18-4703-aa8a-02511c4d62da','default','City has been created','App\\Models\\City','created','e808ee40-7d61-4d60-a4b2-8f6f88cca3cc',NULL,NULL,'{\"attributes\": {\"name\": \"البدرشين\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('79b16658-3e34-474f-a029-b6ebce3922e8','default','City has been created','App\\Models\\City','created','12841424-a69e-4672-b1df-8bc6b1780f04',NULL,NULL,'{\"attributes\": {\"name\": \"دراو\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7a96a2e0-1f03-4110-ae34-a73cadcd13c2','default','City has been created','App\\Models\\City','created','2e6fc100-5e1c-4ec3-8977-8c10c1fddd55',NULL,NULL,'{\"attributes\": {\"name\": \"المحلة الكبرى\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7af892cf-e466-435e-8aab-9493f43c098b','default','User has been updated','App\\Models\\User','updated','e28df551-c71f-4c6e-8d4f-27c75d870afa','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"job_title_id\": \"5344a9c7-804b-490b-a650-fe3bc5fa7aab\", \"department_id\": \"cc52af45-46e9-409a-91f4-396a63bfecd4\"}}',NULL,'2025-04-29 10:42:06','2025-04-29 10:42:06'),
('7b21a4d6-7def-4ea3-af2f-ae4eb33fe879','default','City has been created','App\\Models\\City','created','2ae50471-64ce-491a-8432-a41de45140bc',NULL,NULL,'{\"attributes\": {\"name\": \"الزيتون\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('7b31d8fb-316a-4cff-821a-0c3f0d4c2a3f','default','City has been created','App\\Models\\City','created','1c22dfbb-8187-4c5d-b964-5bcae922cef3',NULL,NULL,'{\"attributes\": {\"name\": \"رفح\", \"government_id\": \"fd597d05-e8ca-4c88-a270-dedf07e8bade\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('7b547fc6-ebad-4022-9932-17f1fcc08cbd','default','LockedOrigin has been created','App\\Models\\LockedOrigin','created','fd1204cd-4bc8-4282-9856-63a4cf290489','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"133464b3-9283-4b66-89f7-a799c38d796d\"}}',NULL,'2025-06-17 11:24:35','2025-06-17 11:24:35'),
('7b67db1f-9c8b-47d1-8bc4-483967edf0f0','default','City has been created','App\\Models\\City','created','bc3cb58f-d79c-4c89-9d29-4dea8ed8a4af',NULL,NULL,'{\"attributes\": {\"name\": \"الكوثر\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('7b68a90e-c579-4032-b1fc-088a760f7cd5','default','City has been created','App\\Models\\City','created','dd45c8f6-72d7-40a2-88a6-c605ade36ef1',NULL,NULL,'{\"attributes\": {\"name\": \"كرداسة\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('7b9ee219-7494-4d7e-a3c5-94e242a57de5','default','Government has been created','App\\Models\\Government','created','50a70a99-9d38-4378-b559-5a0dbd67b161',NULL,NULL,'{\"attributes\": {\"name\": \"قنا\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('7ba800cf-1c50-4832-94d0-61cec9d7f113','default','User has been created','App\\Models\\User','created','507e4996-9cd3-4732-8a24-a22b6035f03b',NULL,NULL,'{\"attributes\": {\"name\": \"احمد عاطف\", \"email\": \"ahmedahtef@gmail.com\", \"status\": 1, \"password\": \"$2y$10$/Eel1nKV05w.mSOPRzpzn.Kf81reOOobqPQVS96AZNpRACcID7jYK\", \"job_title_id\": null, \"phone_number\": \"01225781732\", \"department_id\": null, \"national_number\": \"29203240103611\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('7bad4c00-dadc-473a-9fd9-c2d7803c2bb1','default','Government has been created','App\\Models\\Government','created','19a0685c-975d-4667-b3ae-015c1313e53b',NULL,NULL,'{\"attributes\": {\"name\": \"بورسعيد\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7cb8701e-e7c6-4648-9622-1f55d79c1fd6','default','City has been created','App\\Models\\City','created','5e2402f1-c3f2-4d52-a5f2-7dcf4b8e7c05',NULL,NULL,'{\"attributes\": {\"name\": \"ساحل سليم\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7ceae257-400c-482f-b3f4-5b8bd9f91b76','default','City has been created','App\\Models\\City','created','452be793-6334-471e-8f8f-f1d95b31324d',NULL,NULL,'{\"attributes\": {\"name\": \"المنيا\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7d0d25cb-83ae-417b-af81-97ce507e0fee','default','OriginDetail has been created','App\\Models\\OriginDetail','created','aed33bf6-7bf2-4c3c-9287-e1acdc34e992','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"183885e1-7681-42cf-a63c-99fecd470fa3\", \"unit_area\": \"90.00\", \"number_of_units\": 496, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 496, \"administrative_units\": null, \"number_of_buildings_executed\": 31}}',NULL,'2025-08-06 16:15:53','2025-08-06 16:15:53'),
('7d76497a-64fa-462a-a2ac-5ecbaa42ef7d','default','City has been created','App\\Models\\City','created','009d2293-1987-491c-9ad8-a5acfdc659df',NULL,NULL,'{\"attributes\": {\"name\": \"أبو حمص\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7e20a2d7-3799-4146-b9c6-452947c1cad1','default','Origin has been created','App\\Models\\Origin','created','6cbc00c9-833f-4c50-8a67-a5fb5641782e','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"تقسيم المركز السياحي \", \"used_area\": \"19\", \"project_id\": \"99ef8548-bf04-4fa5-bb68-51ab3947e984\", \"decision_num\": \"781\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2012, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"22867.47\", \"executing_entity_num\": \"22867.47\", \"total_area_allocated\": \"22867.47\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('7e6711cb-7ff5-4dc8-991e-a214cdbe6ec7','default','Origin has been updated','App\\Models\\Origin','updated','34f0e90c-c6e9-4f64-917b-0a7200cefee5','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"sepated_services\": null}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\", \"sepated_services\": \"تحويل عدد 4 وحدات مول تجاري عمارة رقم 114\"}}',NULL,'2025-08-06 16:14:23','2025-08-06 16:14:23'),
('7e94ea9d-81a6-486f-bfd6-2b6f9ce0b5f4','default','City has been created','App\\Models\\City','created','80fab2b1-112a-43f0-b47e-55c282c39a9b',NULL,NULL,'{\"attributes\": {\"name\": \"منفلوط\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7f59a216-1e07-4d23-bce2-5d22fe9416cd','default','City has been created','App\\Models\\City','created','7be215ba-4617-411f-a96a-b95fca7c4905',NULL,NULL,'{\"attributes\": {\"name\": \"عين شمس\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('7f657f62-11e4-4883-8699-69ef993f3aba','default','Origin has been created','App\\Models\\Origin','created','c7450ead-7746-4f32-a04f-7f4bd11df995','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"شرق طريق الشرطة العسكرية \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"8cb7e1e6-0162-427b-be2d-12fede2aea08\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"971\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2023, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"297250\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"297250\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('7fd3d377-92c4-407d-81a4-4af6924e6dd0','default','City has been created','App\\Models\\City','created','e156ee99-e196-47d9-9d18-204dc8c7b3ff',NULL,NULL,'{\"attributes\": {\"name\": \"قليوب\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7fe058f0-ff58-4dd4-9544-450da0e1955f','default','City has been created','App\\Models\\City','created','8674a590-447b-4ff6-9c22-89ed0cd20606',NULL,NULL,'{\"attributes\": {\"name\": \"غيط العنب\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('7ffc964f-9679-41c4-a921-d597a9827351','default','Origin has been updated','App\\Models\\Origin','updated','7955112d-dbc7-4eb6-b1c9-e5b66b8c4b39','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\"}, \"attributes\": {\"decision_type_id\": \"29887624-b6dd-4630-900f-a1f73d1e80c8\"}}',NULL,'2025-05-06 09:44:19','2025-05-06 09:44:19'),
('8007d085-f208-4eb8-861d-2c12113a0694','default','City has been created','App\\Models\\City','created','7a864fdd-218f-4682-a201-dfd0c5d7fff8',NULL,NULL,'{\"attributes\": {\"name\": \"دمياط\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('804cf523-3c18-4222-9d03-dd2ce2caf560','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"old\": {\"location\": \"kjs,nhh5jj\"}, \"attributes\": {\"location\": \"testt\"}}',NULL,'2025-06-02 11:09:04','2025-06-02 11:09:04'),
('80c3714d-1a7c-4832-a8a6-77bf1d4155a3','default','City has been created','App\\Models\\City','created','873aad75-8773-4091-950f-7a8c0b1165f6',NULL,NULL,'{\"attributes\": {\"name\": \"الشلاتين\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8115f1de-923f-4516-8840-0c24b1558485','default','Project has been created','App\\Models\\Project','created','553484be-28ca-4097-9cac-3c210a3e4f18','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 85 عمارة منطقة غرب شارع الإذاعة - رأس غارب \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('81618256-dbce-4222-9b8d-8a82b4010184','default','City has been created','App\\Models\\City','created','e5f83697-4bbb-4690-aee8-66ff4238d607',NULL,NULL,'{\"attributes\": {\"name\": \"سمالوط\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('81c2680f-204f-437a-85c7-a12dc9bac94c','default','Origin has been created','App\\Models\\Origin','created','b6e631b9-330b-4818-adc8-2d7b258c4eb0','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"منطقة الأحياء بجوار بيتكو \", \"used_area\": \"0\", \"project_id\": \"e768b283-ce53-40bc-a80d-c77331ce8191\", \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"131895.64\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"excellent\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"62\", \"total_area_coords\": \"131895.64\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"131895.64\"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('823af2ec-c7ca-4831-b040-da232d345e5a','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"131895.64\"}, \"attributes\": {\"coordinates\": [[27.242558335402244, 33.81105555511909], [27.239458330697374, 33.80718055542572], [27.24074270789259, 33.80621879893076], [27.2413448800376, 33.806480211004846], [27.242822226780664, 33.8064694447319], [27.24402532635973, 33.80826733133744], [27.243336112104068, 33.80887222240619], [27.244116664149377, 33.81004444436419]], \"total_area_coords\": \"135995.60650353\"}}',NULL,'2025-05-24 22:17:27','2025-05-24 22:17:27'),
('82654940-7a3a-4173-a4b8-d583e0c457e3','default','User has been updated','App\\Models\\User','updated','507e4996-9cd3-4732-8a24-a22b6035f03b','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"password\": \"$2y$10$/Eel1nKV05w.mSOPRzpzn.Kf81reOOobqPQVS96AZNpRACcID7jYK\"}, \"attributes\": {\"password\": \"$2y$10$crr4b2G1EbYA/uGeR2PMxOy4IYuthNHrN2qPGrbFxTkravt9/IG0a\"}}',NULL,'2025-05-04 11:23:03','2025-05-04 11:23:03'),
('826f1367-b89e-4d3e-ab20-5101dd346948','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"origin_status\": \"revision\"}, \"attributes\": {\"origin_status\": \"inprogress\"}}',NULL,'2025-05-27 09:22:41','2025-05-27 09:22:41'),
('832fbfac-c1e9-4e78-a0b9-3b4f99984c6b','default','Origin has been updated','App\\Models\\Origin','updated','8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"22\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"55500\"}, \"attributes\": {\"city_id\": \"42fb7d1e-1dc7-47c3-b6b8-975d09f19664\", \"used_area\": \"55500\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"22\"}}',NULL,'2025-05-04 12:50:49','2025-05-04 12:50:49'),
('83844460-40fb-4b4b-be67-df92b1f8f5d0','default','User has been updated','App\\Models\\User','updated','b487eaf4-1582-4966-aace-bfa3a3a272d1','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"job_title_id\": \"c969eed4-c2f2-4b5e-a831-d4e6208c5f84\", \"department_id\": \"214f9847-9362-489b-9c60-3aa3ebac79a9\"}}',NULL,'2025-04-29 10:50:48','2025-04-29 10:50:48'),
('8442f2a9-35e3-4bfc-b569-956f8e99a64c','default','City has been created','App\\Models\\City','created','00413ad2-e740-415c-bc55-d7131828f11c',NULL,NULL,'{\"attributes\": {\"name\": \"قفط\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('86948109-1613-49a2-a241-f4104b90165d','default','City has been created','App\\Models\\City','created','f700a3e1-25d9-40df-8028-cb41fdfe7db5',NULL,NULL,'{\"attributes\": {\"name\": \"ببا\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('86f2f55e-9506-440a-96fb-ae334384809c','default','City has been created','App\\Models\\City','created','07a0d396-c62f-464f-848c-7e47e55e1d88',NULL,NULL,'{\"attributes\": {\"name\": \"ديرب نجم\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('87574730-3508-491e-a43b-31781fd75647','default','City has been created','App\\Models\\City','created','f76df5a3-287d-431b-be14-978f5574a9bf',NULL,NULL,'{\"attributes\": {\"name\": \"جليم\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('87ccd9d3-86d1-48a3-ae8a-a02f22a360fc','default','Statement has been created','App\\Models\\Statement','created','5cc76d6c-a2ba-4209-81b6-063e0b5c52f0','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"مديرية الإسكان والمرافق بمحافظة البحر الأحمر \"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('88048615-0a55-4fe4-bcc5-1d6c1f889a9f','default','City has been created','App\\Models\\City','created','b1d6bf5e-023b-4920-ba1a-0d84a1079959',NULL,NULL,'{\"attributes\": {\"name\": \"الحسينية\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('8874473f-6f44-4475-bd47-cdfe0b632d0a','default','City has been created','App\\Models\\City','created','3fecfdce-8226-4af3-a60f-48c9973605fd',NULL,NULL,'{\"attributes\": {\"name\": \"جهينة الغربية\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('891524ac-8af5-4eef-be6d-22eee6f73a71','default','Government has been created','App\\Models\\Government','created','1a99feee-6a40-4988-a798-8c11978358df',NULL,NULL,'{\"attributes\": {\"name\": \"السويس\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('89263b9f-adca-4783-b14f-47ea4568ed0e','default','City has been created','App\\Models\\City','created','28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363',NULL,NULL,'{\"attributes\": {\"name\": \"الساحل الشمالى\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('893e2fab-d37e-4b36-8660-53f0b1bcd179','default','City has been created','App\\Models\\City','created','369b4caa-d5be-4ecb-9ca4-5cd353213758',NULL,NULL,'{\"attributes\": {\"name\": \"بسيون\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8a9942c0-ccea-4108-bcb1-89b044ea5f09','default','City has been created','App\\Models\\City','created','73f2378f-4563-468c-8580-c98bc4e97a6a',NULL,NULL,'{\"attributes\": {\"name\": \"إطسا\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8abf83cb-2205-41c0-ac9a-0d05cca6b1c4','default','City has been created','App\\Models\\City','created','43aa3f33-2d78-4b66-8a64-ee81dbf92e76',NULL,NULL,'{\"attributes\": {\"name\": \"المفروزة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('8af8a486-6748-49d4-8926-116028cfe39b','default','City has been created','App\\Models\\City','created','937c65bb-7cb5-4940-8a31-7544852a54c8',NULL,NULL,'{\"attributes\": {\"name\": \"فيكتوريا\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('8b573374-eff0-4503-9144-a464abb36304','default','City has been created','App\\Models\\City','created','41164875-fd9e-48f9-86b8-3ed071d7cc09',NULL,NULL,'{\"attributes\": {\"name\": \"الوقف\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('8b79a576-fe61-4885-bcb0-0f898a47d7d1','default','Project has been created','App\\Models\\Project','created','8cb7e1e6-0162-427b-be2d-12fede2aea08','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 280 عمارة شرق طريق الشرطة العسكرية - رأس غارب \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('8b81bedc-a5c2-40a5-8a72-e66e759434f2','default','Origin has been created','App\\Models\\Origin','created','a6ee68a0-6fed-4d6d-9a00-b70cccffc958','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم الحجاز منطقة أبوعشرة \", \"used_area\": \"300\", \"created_by\": null, \"project_id\": \"8f7bd399-c11e-462c-aa8c-2ad7ec5ce065\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"46670\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"24\", \"total_area_coords\": \"615000\", \"executing_entity_num\": \"568330\", \"total_area_allocated\": \"615000\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('8be5caef-0943-45fb-84ee-027b1367c571','default','OriginDetail has been created','App\\Models\\OriginDetail','created','06f5425e-372f-4f4f-8399-f563480da559','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 360, \"commercial_shops\": 40, \"commercial_units\": 10, \"residential_units\": 360, \"administrative_units\": null, \"number_of_buildings_executed\": 18}}',NULL,'2025-08-06 15:48:55','2025-08-06 15:48:55'),
('8bf639be-e1a7-4665-8c73-3528230ea51f','default','Project has been created','App\\Models\\Project','created','99ef8548-bf04-4fa5-bb68-51ab3947e984','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 19 عمارة تقسيم المركز السياحي - القصير  \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('8c3d99b9-98a7-4f5f-a8ed-c601595cccac','default','Government has been created','App\\Models\\Government','created','3995d987-3263-460b-b453-a62c21fd6050',NULL,NULL,'{\"attributes\": {\"name\": \"المنيا\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8c854ec2-1854-4076-9204-7a181d686372','default','Government has been created','App\\Models\\Government','created','894cb001-e9b0-43bf-8bcf-db953ebc4e98',NULL,NULL,'{\"attributes\": {\"name\": \"الغربية\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8cad05a9-ef56-4ac2-ae88-924a675cbefb','default','City has been created','App\\Models\\City','created','942439be-5d0e-429d-8b85-486c0d64b913',NULL,NULL,'{\"attributes\": {\"name\": \"العطارين\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('8cb97fe7-c957-4934-aa9c-9cafb8aff746','default','City has been created','App\\Models\\City','created','ac51da1b-6d5e-4c41-9c39-9ceafce8ddb2',NULL,NULL,'{\"attributes\": {\"name\": \"النوبارية الجديدة\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8d4c028b-97c5-45c9-b0b3-7fc8c2c6017a','default','OriginDetail has been created','App\\Models\\OriginDetail','created','1117a30e-9dcc-480f-b8c6-19c9eb946424','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 700, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 700, \"administrative_units\": null, \"number_of_buildings_executed\": 35}}',NULL,'2025-08-07 08:18:37','2025-08-07 08:18:37'),
('8d4c389f-f043-4f4d-8be4-7d66b572ea1d','default','City has been created','App\\Models\\City','created','ff89b1ba-cfbe-426c-aa9e-e97f22bd62d5',NULL,NULL,'{\"attributes\": {\"name\": \"العين السخنة\", \"government_id\": \"1a99feee-6a40-4988-a798-8c11978358df\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('8d726549-5d31-4fbe-9ba2-47edb288ef49','default','City has been created','App\\Models\\City','created','a43d9370-41bd-4b42-abc3-f920438a6793',NULL,NULL,'{\"attributes\": {\"name\": \"المرج\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('8e235d54-171d-4bdc-9df7-63df562da96b','default','City has been created','App\\Models\\City','created','695ca204-354d-4f80-b3e5-9983bb0d8cb5',NULL,NULL,'{\"attributes\": {\"name\": \"الدلنجات\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8e2d2ca0-c27a-46da-bf06-351e929002a4','default','City has been created','App\\Models\\City','created','9ef4679b-a291-42ab-9c08-d51d45761b4b',NULL,NULL,'{\"attributes\": {\"name\": \"منوف\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8e4548b8-0f2f-45c4-99ee-4685a5a02d5f','default','OriginDetail has been created','App\\Models\\OriginDetail','created','2a2bc4de-0db0-4489-902e-cca59936495e','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-06 15:36:06','2025-08-06 15:36:06'),
('8f0a3571-e97c-400a-bd16-a67076315c7a','default','City has been created','App\\Models\\City','created','81b7b5f0-a007-4fdd-b6ee-93fd1d766679',NULL,NULL,'{\"attributes\": {\"name\": \"دكرنس\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('8f0de98f-cb78-413e-aead-dd9a539620e9','default','Origin has been created','App\\Models\\Origin','created','83298f83-54b2-4f6e-ba95-a98a0175c7dd','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم دمج جميع المناطق \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"منطقة غرب شارع الإذاعة \", \"used_area\": \"85\", \"project_id\": \"553484be-28ca-4097-9cac-3c210a3e4f18\", \"decision_num\": \"867\", \"statement_id\": \"114e446a-71c7-4e79-a6d5-0ddf770b7a8d\", \"decision_date\": 2012, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"93900\", \"executing_entity_num\": \"93900\", \"total_area_allocated\": \"93900\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('8f50f206-ec1c-4a27-aa87-085f5576f57b','default','City has been created','App\\Models\\City','created','b3b8ef4d-8d9a-407a-b5d4-0603e62f6bd1',NULL,NULL,'{\"attributes\": {\"name\": \"الصالحية الجديدة\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('8fccb68f-2b67-4a5b-b0fc-98d71bf64bbd','default','Government has been created','App\\Models\\Government','created','32f67e21-6aa2-4bf8-ac48-a26310ba9906',NULL,NULL,'{\"attributes\": {\"name\": \"دمياط\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('90cd7bc2-687a-42ec-86ce-c9e432e8ea92','default','Government has been created','App\\Models\\Government','created','3a0630ec-711b-4ed2-9846-d388c5457eb1',NULL,NULL,'{\"attributes\": {\"name\": \"القاهرة\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('91a9b53f-b00d-4d13-95b4-10cca529d2e0','default','Project has been created','App\\Models\\Project','created','b81c433c-94fd-421f-8a68-0cd152187eea','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 126 عمارة تقسيم شمال الأحياء - الغردقة  \"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('91acc6de-6822-4e24-9a0f-f8ac24d54838','default','City has been created','App\\Models\\City','created','402a5030-33f6-45e5-9b2b-65e63b437421',NULL,NULL,'{\"attributes\": {\"name\": \"صان الحجر القبلية\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('91cb041c-4572-4619-9551-be0c75875e02','default','Government has been created','App\\Models\\Government','created','d2987377-dfd6-4d83-8d73-a83dbe5f7530',NULL,NULL,'{\"attributes\": {\"name\": \"جنوب سيناء\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('921bbb9b-d8a6-45b2-88cf-2e2acc5bcf84','default','Origin has been created','App\\Models\\Origin','created','f2ec34d9-9cee-4318-b24f-e48f54101436','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم الاكتفاء بعدد 14 عمارة ويوجد مساحة شاغرة = 3524م2\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"التقسيم الحضري \", \"used_area\": \"14\", \"created_by\": null, \"project_id\": \"83b33fa5-dce6-485f-b0ee-b3ad9f85ab12\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"65\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2018, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"3524\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"24225\", \"executing_entity_num\": \"24225\", \"total_area_allocated\": \"24225\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('92bb9dc2-9d85-457b-8818-ca2185ca7c45','default','City has been created','App\\Models\\City','created','d42948b3-aef5-4d00-a5af-705dff84517d',NULL,NULL,'{\"attributes\": {\"name\": \"نبروه\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('936bdee0-9411-4b30-8241-6e8380bb3b42','default','OriginDetail has been created','App\\Models\\OriginDetail','created','49051268-c5c7-4db4-97f9-8140db35990a','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 920, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 920, \"administrative_units\": null, \"number_of_buildings_executed\": 46}}',NULL,'2025-08-07 08:22:12','2025-08-07 08:22:12'),
('94c2254f-de76-4a13-a7d2-5a7c6a5aa877','default','City has been created','App\\Models\\City','created','ed6e75d3-9838-4e6d-aac4-1400ea5ad27a',NULL,NULL,'{\"attributes\": {\"name\": \"المنصورة\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('94ffaec6-f4f9-4d4d-a142-0fdaacde8def','default','City has been created','App\\Models\\City','created','1fbe3e7e-6dd8-4a93-8d85-4e11b99e1c9f',NULL,NULL,'{\"attributes\": {\"name\": \"الضبعة\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('955a1b73-b67a-4016-aa9a-9741d0a8117d','default','City has been created','App\\Models\\City','created','7a2dc8ed-6583-4816-a419-b1d85b0ac2dc',NULL,NULL,'{\"attributes\": {\"name\": \"الطود\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('957cbfba-11a1-4a7d-b269-c6d88a39a08d','default','Department has been created','App\\Models\\Department','created','214f9847-9362-489b-9c60-3aa3ebac79a9',NULL,NULL,'{\"attributes\": {\"name\": \"الهندسية\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('95a7e279-30ed-4e70-92ba-89c0488a3537','default','City has been created','App\\Models\\City','created','74d12ef1-69c2-4510-85d0-83ed5dc574d8',NULL,NULL,'{\"attributes\": {\"name\": \"مدينة العبور\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('95abbae2-f2f1-4502-b097-ce36c48d26af','default','Responsibility has been created','App\\Models\\Responsibility','created','c0f46ea3-90fa-44d2-9178-eab36f8617dc',NULL,NULL,'{\"attributes\": {\"name\": \"التقيم و التسعير\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('95ea954f-85f5-462a-b455-8eb3f479cc45','default','City has been created','App\\Models\\City','created','c5ce8d27-aa52-4553-a7cf-97dd879775a5',NULL,NULL,'{\"attributes\": {\"name\": \"كليوباترا\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('9639e5c3-de66-4051-9ee1-e0b9294fe4e8','default','City has been created','App\\Models\\City','created','e8237e13-0b63-4bb9-ac4b-96a0026139d9',NULL,NULL,'{\"attributes\": {\"name\": \"أبو النمرس\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('96581324-4427-4756-8b7e-cdadcc9b00a6','default','City has been created','App\\Models\\City','created','2a733108-ee70-498e-aeaf-55fa91a1cd88',NULL,NULL,'{\"attributes\": {\"name\": \"سيدي براني\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('971929e2-d4f9-44c3-9354-ae93fd1188cd','default','City has been created','App\\Models\\City','created','e62ee93a-6c7c-41d1-8024-881a633cf985',NULL,NULL,'{\"attributes\": {\"name\": \"نصر النوبة\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('97777934-aa5e-4abd-bf0b-1331ac90c7c1','default','OriginDetail has been created','App\\Models\\OriginDetail','created','5adbbd48-f283-4a8a-8f17-5d170ad0bb6f','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"origin_id\": \"a19237b5-9d95-4e6d-ac97-80d6c372a4f4\", \"unit_area\": \"100.00\", \"number_of_units\": null, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": null, \"administrative_units\": null, \"number_of_buildings_executed\": 200}}',NULL,'2025-07-22 09:52:38','2025-07-22 09:52:38'),
('97badca4-3dfe-40dd-8105-fb36ec401eca','default','City has been created','App\\Models\\City','created','a3185a47-cdd5-435d-ae6f-4fd29733cf87',NULL,NULL,'{\"attributes\": {\"name\": \"الموسكى\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('98b8bd14-eeda-4229-a5a1-2ed8292de280','default','City has been created','App\\Models\\City','created','d68f9c9a-ed76-49f8-a4e5-8c0ce3eddcfa',NULL,NULL,'{\"attributes\": {\"name\": \"محلة دمنة\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('98e69e22-2584-413d-a6f3-1ee3164d05d0','default','City has been created','App\\Models\\City','created','7d139f53-4657-4912-bb6e-b8826c699047',NULL,NULL,'{\"attributes\": {\"name\": \"باريس\", \"government_id\": \"9d091593-1817-4565-9fe2-123eb626fc1d\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('991ea701-ca16-4bd3-9f79-636d36ca712a','default','OriginDetail has been created','App\\Models\\OriginDetail','created','9957f945-c8ae-400a-bff7-90b6a58f6773','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-07 08:40:45','2025-08-07 08:40:45'),
('99ce7b1a-62a0-4023-bf96-912b5dd975c3','default','EditRequestOrigin has been updated','App\\Models\\EditRequestOrigin','updated','3d6dca50-b049-4e3d-82fe-c7976f74cfc9','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"status\": \"pending\"}, \"attributes\": {\"status\": \"approved\"}}',NULL,'2025-05-27 09:22:07','2025-05-27 09:22:07'),
('9a06ff79-b5a0-4633-a310-e3ad5390f6cd','default','JobTitle has been created','App\\Models\\JobTitle','created','5344a9c7-804b-490b-a650-fe3bc5fa7aab',NULL,NULL,'{\"attributes\": {\"name\": \"مدير عام البنية التحتية وتأمين المعلومات\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('9a358e4c-4270-4b0f-bf8d-e65a83ac91fc','default','City has been created','App\\Models\\City','created','800dcf20-2ad5-46e5-ba77-c7c581221714',NULL,NULL,'{\"attributes\": {\"name\": \"الجمالية\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('9a687539-05d0-41cd-b610-a081d68a933c','default','City has been created','App\\Models\\City','created','b6a12a01-c2be-4a8c-8df8-c207dd2483b4',NULL,NULL,'{\"attributes\": {\"name\": \"حى مبارك\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('9c629c5b-1bdb-4887-af4d-9948ef8310dc','default','Project has been created','App\\Models\\Project','created','e768b283-ce53-40bc-a80d-c77331ce8191','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 62 عمارة بمنطقة الأحياء بجوار شركة بيتكو - الغردقة \"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('9c76dda0-b8c9-488a-bbc3-8d2996e40d35','default','OriginDetail has been created','App\\Models\\OriginDetail','created','39c6629c-02d7-4d94-992d-4b66fb1b7981','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 700, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 700, \"administrative_units\": null, \"number_of_buildings_executed\": 35}}',NULL,'2025-08-06 15:58:45','2025-08-06 15:58:45'),
('9cb632df-03bb-4ab6-8653-8b9525a62010','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.407999997]], \"total_area_coords\": \"135995.60650319\"}, \"attributes\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999956]], \"total_area_coords\": \"135995.60650312\"}}',NULL,'2025-05-27 13:13:14','2025-05-27 13:13:14'),
('9ce914f1-ce74-4bf1-810f-7f50f1034527','default','Origin has been created','App\\Models\\Origin','created','bc64ebf7-cda3-4b32-a8a1-47605671a284','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم شمال الأحياء \", \"used_area\": \"126\", \"created_by\": null, \"project_id\": \"98f4004a-0c62-4daf-a2e7-bc37bca85658\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"503\", \"statement_id\": \"b95742fc-80c0-44d7-897c-88e52d11fc23\", \"decision_date\": 2021, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"210000\", \"executing_entity_num\": \"210000\", \"total_area_allocated\": \"210000\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('9d05fc15-0281-4663-b6a7-6bdd94e45c96','default','City has been created','App\\Models\\City','created','7e2e0d23-c849-4b3f-8d5e-f9078cc4b56f',NULL,NULL,'{\"attributes\": {\"name\": \"بورفؤاد\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('9d756804-fa9a-4283-8e9e-e161f70652b7','default','Project has been created','App\\Models\\Project','created','721373d9-6c9f-407e-afe3-638f8b5e6dcc','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 22 عمارة تقسيم القمر – سفاجا\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('9d822c00-ae7a-4398-bab5-d305b023ca5f','default','City has been created','App\\Models\\City','created','0fdfb3cc-5355-42aa-8e76-53ea3418aa3f',NULL,NULL,'{\"attributes\": {\"name\": \"حدائق اكتوبر\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('9e983902-a705-4490-9e9a-a7e243b6e9ef','default','Origin has been updated','App\\Models\\Origin','updated','0fcbcbd8-1c21-4799-ad3a-e02975839dd6','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/es12bOPdL0QtExCGkd3NDv4mXcB4Zfy9a8nEjRlH.pdf\"}}',NULL,'2025-05-04 13:18:34','2025-05-04 13:18:34'),
('9eadb69b-d09d-4e4f-9b9d-a9f2e37e9287','default','City has been created','App\\Models\\City','created','725c821a-bb0d-4abd-a75f-a160375aa8f7',NULL,NULL,'{\"attributes\": {\"name\": \"ارض اللواء\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('9ed9ac9c-e953-4d92-8e67-2ac4c2725281','default','City has been created','App\\Models\\City','created','923ce550-01f2-4cfd-9be8-fb8f408aaf5a',NULL,NULL,'{\"attributes\": {\"name\": \"إهناسيا\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('9f36e0f3-06cf-409d-a253-fe7b2815084c','default','Origin has been updated','App\\Models\\Origin','updated','133464b3-9283-4b66-89f7-a799c38d796d','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"created_by\": null, \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}, \"attributes\": {\"city_id\": \"254eb4b1-4d6c-49bd-bbe7-82d8c477c69c\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-05-04 12:54:07','2025-05-04 12:54:07'),
('9f6d4e0e-ad79-415e-a34d-147b06ed574e','default','City has been created','App\\Models\\City','created','ddcdeef3-ccbd-434e-ac2e-72d3709a2123',NULL,NULL,'{\"attributes\": {\"name\": \"الظاهر\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('9fea4e68-04c0-4b52-96b3-b77b7f981ab1','default','City has been created','App\\Models\\City','created','42fb7d1e-1dc7-47c3-b6b8-975d09f19664',NULL,NULL,'{\"attributes\": {\"name\": \"سفاجا\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a02b56a9-3ef1-4061-825c-0f6b446ffd4a','default','OriginDetail has been created','App\\Models\\OriginDetail','created','39d62bed-1620-4f19-8c40-41288b1ce635','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c\", \"unit_area\": \"120.00\", \"number_of_units\": 2300, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 2300, \"administrative_units\": null, \"number_of_buildings_executed\": 115}}',NULL,'2025-08-06 16:00:52','2025-08-06 16:00:52'),
('a02bc197-e99e-4432-8988-db176b4c75d1','default','City has been created','App\\Models\\City','created','6aebfbe1-46db-4dc5-a4ae-e7ac74bbedf8',NULL,NULL,'{\"attributes\": {\"name\": \"المراغة\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('a05d00b6-0b47-4346-a88c-e1e6c1bac43a','default','Government has been created','App\\Models\\Government','created','fd597d05-e8ca-4c88-a270-dedf07e8bade',NULL,NULL,'{\"attributes\": {\"name\": \"شمال سيناء\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('a0e509a1-e945-46e7-af21-12a1f6c18ed7','default','City has been created','App\\Models\\City','created','da320495-5e81-41af-932b-9fdc86924030',NULL,NULL,'{\"attributes\": {\"name\": \"منشأة البكاري\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('a117390a-5f87-4717-8eb8-333b97f5c327','default','User has been updated','App\\Models\\User','updated','8477fe7e-9650-4e45-bc88-d9542d71cc53','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": \"c969eed4-c2f2-4b5e-a831-d4e6208c5f84\"}, \"attributes\": {\"job_title_id\": \"6da764d9-bf25-44df-af15-130d21f9024d\"}}',NULL,'2025-05-24 21:30:57','2025-05-24 21:30:57'),
('a1271bf5-8f60-49ac-b5d0-c9a55d3fabfd','default','City has been created','App\\Models\\City','created','9c35a527-974c-48b4-b9ee-83b37428106b',NULL,NULL,'{\"attributes\": {\"name\": \"بلاط\", \"government_id\": \"9d091593-1817-4565-9fe2-123eb626fc1d\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('a12bf676-78b5-48c8-9546-b5093f5966e2','default','City has been created','App\\Models\\City','created','fe9df9fd-4f9a-443d-a37e-b1d84e660302',NULL,NULL,'{\"attributes\": {\"name\": \"الفشن\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('a194334f-4f6a-41a3-b490-2c00cd5ebc6c','default','Origin has been updated','App\\Models\\Origin','updated','34f0e90c-c6e9-4f64-917b-0a7200cefee5','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_date\": 2021, \"decision_image\": null}, \"attributes\": {\"decision_date\": 2013, \"decision_image\": \"decision-images/W7n0Ce0pvbPlJYEKlu6Yn330nN6Qc2DjzBD3hzRx.pdf\"}}',NULL,'2025-05-04 13:06:58','2025-05-04 13:06:58'),
('a19feedc-9807-455f-92ba-4d97405c02bd','default','Project has been created','App\\Models\\Project','created','0099f4c5-b3c9-419a-9ec5-cb73b42f7fb7','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"مقر شالية بروتو السخنة نموذج A\"}}',NULL,'2025-05-06 09:37:59','2025-05-06 09:37:59'),
('a1a093e8-5677-4caf-b56f-5f1dc258cebc','default','City has been created','App\\Models\\City','created','8e15f276-f6c5-4cfc-a4f5-87a7d4d7a912',NULL,NULL,'{\"attributes\": {\"name\": \"القوصية\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('a20922dd-3439-4690-ade4-befaf645d521','default','City has been created','App\\Models\\City','created','084be99c-2c02-4ef2-b165-40c91ae13ca6',NULL,NULL,'{\"attributes\": {\"name\": \"المهندسين\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('a24d2303-f1ee-45e8-a575-f9069cbe350b','default','City has been created','App\\Models\\City','created','7a5905bd-393d-43d7-96d5-a64418bb215f',NULL,NULL,'{\"attributes\": {\"name\": \"حدائق القبة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('a257133c-6496-4bf3-8fa3-7136e5e0d0d6','default','Department has been created','App\\Models\\Department','created','cbbdca8a-d15b-4b43-b5a0-42b402716551',NULL,NULL,'{\"attributes\": {\"name\": \"الدعم\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('a29413d7-29d8-4eb6-bc1e-7f0763c79f62','default','City has been created','App\\Models\\City','created','7bc4dbd0-ce87-4502-9467-f4b6386f07ff',NULL,NULL,'{\"attributes\": {\"name\": \"سيوة\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('a2d55fae-bb36-4662-8f60-19871fff81f0','default','City has been created','App\\Models\\City','created','f5d9abb9-4ba6-4c1c-9b15-5de123cf9fdf',NULL,NULL,'{\"attributes\": {\"name\": \"شبين الكوم\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a3148406-517f-4609-a9a8-aa8915a09168','default','City has been created','App\\Models\\City','created','22d5e3d8-0636-43aa-ae43-461295d80185',NULL,NULL,'{\"attributes\": {\"name\": \"أبو رواش\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('a31b5f4e-0918-4c1e-b642-2692eae5e912','default','City has been created','App\\Models\\City','created','1e9a9f71-93e3-495b-8fb9-961510c7e94c',NULL,NULL,'{\"attributes\": {\"name\": \"أبو كبير\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('a3a078ad-3e15-47fa-bb73-34ddb4833cd4','default','City has been created','App\\Models\\City','created','6cee1abd-d1d7-4265-a612-ecf54e5d9048',NULL,NULL,'{\"attributes\": {\"name\": \"الشهداء\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a412792e-9c57-4a26-9996-9e43440fde89','default','City has been created','App\\Models\\City','created','2b34b09e-9337-4fc2-b1a4-5572262382fa',NULL,NULL,'{\"attributes\": {\"name\": \"بولاق\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('a4e39810-79d6-4ab7-9868-d2d855157959','default','OriginDetail has been created','App\\Models\\OriginDetail','created','17114332-d635-492f-a6a4-9f03a34f5dfe','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 5100, \"administrative_units\": null, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-07 08:18:37','2025-08-07 08:18:37'),
('a53fe08c-e1f4-4c9f-971d-31eca2dcc927','default','City has been created','App\\Models\\City','created','254eb4b1-4d6c-49bd-bbe7-82d8c477c69c',NULL,NULL,'{\"attributes\": {\"name\": \"القصير\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a578ac8b-66b8-4baa-82e4-0388780b1f2a','default','Government has been created','App\\Models\\Government','created','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2',NULL,NULL,'{\"attributes\": {\"name\": \"الإسماعلية\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a5900ece-3b65-4088-b7da-3d9e4432870b','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"decision_image\": \"decision-images/JnSa1FptQFqbINRXhpimT5L3931UdyvabW5tWCje.png\"}, \"attributes\": {\"decision_image\": \"decision-images/PDqgKAODTA19SmSW5VZHXwgxTi40o6k07VNwqdkz.pdf\"}}',NULL,'2025-05-05 12:38:30','2025-05-05 12:38:30'),
('a5e81259-f9b4-4682-8e69-a2591bc20a75','default','Origin has been updated','App\\Models\\Origin','updated','e8dfdbf9-945a-4033-abfe-67b715d1b7fd','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}, \"attributes\": {\"city_id\": \"117882bf-f80d-471c-8329-d6e261ed4988\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-29 11:16:51','2025-04-29 11:16:51'),
('a6807844-f417-430c-b4b9-64cd7b2972b4','default','Origin has been created','App\\Models\\Origin','created','d37f766e-6d40-4626-b592-b3b53b0188bd','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم الحجاز منطقة أبوعشرة \", \"used_area\": \"300\", \"created_by\": null, \"project_id\": \"8f7bd399-c11e-462c-aa8c-2ad7ec5ce065\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"46670\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"24\", \"total_area_coords\": \"615000\", \"executing_entity_num\": \"568330\", \"total_area_allocated\": \"615000\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('a79cdb0e-0988-4dff-bc7b-2c70491ede8b','default','City has been created','App\\Models\\City','created','f6da9115-f2b9-469a-98ba-c24e59ed8d22',NULL,NULL,'{\"attributes\": {\"name\": \"المنشية\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('a7db829f-a6d8-43b8-830c-46f7fb383613','default','Origin has been updated','App\\Models\\Origin','updated','a19237b5-9d95-4e6d-ac97-80d6c372a4f4','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": [[[568894.8467999992, 3022107.1544999997], [568964.3892000001, 3022203.853199998], [569038.3426, 3022150.4186], [568970.7224999999, 3022054.038], [568894.8467999992, 3022107.1544999997]], [[568841.5976000003, 3022292.0938], [568941.4879000005, 3022220.0335], [568834.3096000003, 3022071.1235999996], [568738.8840999997, 3022134.8542000004], [568841.5976000003, 3022292.0938]], [[568741.2440000001, 3022101.9907999993], [568917.5522, 3021978.3543999996], [568761.8609000004, 3021755.634099999], [568561.2202000004, 3021905.446], [568741.2440000001, 3022101.9907999993]], [[568400.6815999999, 3021713.0121], [568546.7115000004, 3021895.0575], [568750.6801000005, 3021739.8791], [568622.8376000004, 3021574.2891], [568400.6815999999, 3021713.0121]], [[568383.7646000005, 3021690.763999998], [568606.4284999997, 3021534.7635999992], [568458.9268000001, 3021320.0931999995], [568226.7471, 3021456.9662999995], [568383.7646000005, 3021690.763999998]], [[568894.8467999992, 3022107.1544999997], [568964.3892000001, 3022203.853199998], [569038.3426, 3022150.4186], [568894.8467999992, 3022107.1544999997]]], \"total_area_coords\": \"231845.80196557\"}, \"attributes\": {\"coordinates\": [[[568894.8467999992, 3022107.1544999997], [568964.3892000001, 3022203.853199998], [569038.3426, 3022150.4186], [568970.7224999999, 3022054.038], [568894.8467999992, 3022107.1544999997]], [[568841.5976000003, 3022292.0938], [568941.4879000005, 3022220.0335], [568834.3096000003, 3022071.1235999996], [568738.8840999997, 3022134.8542000004], [568841.5976000003, 3022292.0938]], [[568741.2440000001, 3022101.9907999993], [568917.5522, 3021978.3543999996], [568761.8609000004, 3021755.634099999], [568561.2202000004, 3021905.446], [568741.2440000001, 3022101.9907999993]], [[568400.6815999999, 3021713.0121], [568546.7115000004, 3021895.0575], [568750.6801000005, 3021739.8791], [568622.8376000004, 3021574.2891], [568400.6815999999, 3021713.0121]], [[568383.7646000005, 3021690.763999998], [568606.4284999997, 3021534.7635999992], [568458.9268000001, 3021320.0931999995], [568226.7471, 3021456.9662999995], [568383.7646000005, 3021690.763999998]]], \"total_area_coords\": \"226399.48176927\"}}',NULL,'2025-05-29 12:53:47','2025-05-29 12:53:47'),
('a8fdca56-9525-40d4-99b7-58d145431747','default','City has been created','App\\Models\\City','created','32cc3dd0-9f1e-452f-8f0a-74d922147cf9',NULL,NULL,'{\"attributes\": {\"name\": \"فارسكور\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('a92b69dd-b202-4b6c-bd89-3329d9b5cd19','default','City has been created','App\\Models\\City','created','200ce370-99b2-48a2-a05d-c02b419e0373',NULL,NULL,'{\"attributes\": {\"name\": \"مغاغة\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('a937b560-ad46-4885-98c9-4c6cd3dcea85','default','User has been updated','App\\Models\\User','updated','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"email\": \"abdelhamedmohamed@gmail.com\"}, \"attributes\": {\"email\": \"abdelhamed-m@mff.gov.eg\"}}',NULL,'2025-06-03 13:56:43','2025-06-03 13:56:43'),
('a9649198-3b82-4561-995f-06a1b225db52','default','Origin has been updated','App\\Models\\Origin','updated','183885e1-7681-42cf-a63c-99fecd470fa3','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\"}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\"}}',NULL,'2025-08-06 16:15:53','2025-08-06 16:15:53'),
('a9b6fac2-d638-43d6-b19e-986e7294bf36','default','OriginDetail has been created','App\\Models\\OriginDetail','created','e7b817ec-b40c-478e-8200-456c5020f6af','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"9b372dd0-c0c6-497b-8c7b-3592ab39182a\", \"unit_area\": \"90.00\", \"number_of_units\": 168, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 168, \"administrative_units\": null, \"number_of_buildings_executed\": 14}}',NULL,'2025-08-06 16:02:25','2025-08-06 16:02:25'),
('aa3ed2f0-d5b4-4f30-a168-b86aaad1b425','default','City has been created','App\\Models\\City','created','6eef40e7-5dc7-44dc-a631-374f60efa027',NULL,NULL,'{\"attributes\": {\"name\": \"رأس سدر\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('aa64de43-aa76-4d51-8744-3cc90e2122f5','default','OriginDetail has been created','App\\Models\\OriginDetail','created','078b709e-93bf-4b0d-a901-87f5827c5689','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"34f0e90c-c6e9-4f64-917b-0a7200cefee5\", \"unit_area\": \"90.00\", \"number_of_units\": 2520, \"commercial_shops\": 18, \"commercial_units\": 12, \"residential_units\": 2504, \"administrative_units\": null, \"number_of_buildings_executed\": 126}}',NULL,'2025-08-06 16:14:23','2025-08-06 16:14:23'),
('aa6e0485-b69b-4913-bcd9-060746d3620c','default','City has been created','App\\Models\\City','created','1aa4140a-9e42-47cb-b6d3-68202bfa4d5c',NULL,NULL,'{\"attributes\": {\"name\": \"القنايات\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('ac388eb9-dd6f-447b-afab-a59271299ec8','default','City has been created','App\\Models\\City','created','670b58f5-9aee-45d6-a167-b825eebd1100',NULL,NULL,'{\"attributes\": {\"name\": \"بلقاس\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('ac8c8bb1-8ccc-4085-b8cb-56b678dcff05','default','City has been created','App\\Models\\City','created','57ab6f25-135a-4bbf-b698-29897ba51c28',NULL,NULL,'{\"attributes\": {\"name\": \"موط\", \"government_id\": \"9d091593-1817-4565-9fe2-123eb626fc1d\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ad1c10c5-509d-4065-898e-bf37420b147b','default','City has been created','App\\Models\\City','created','b8e6a299-c016-4acb-92f9-3a992c79242e',NULL,NULL,'{\"attributes\": {\"name\": \"إدفو\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ae69baf4-0304-4d88-aec0-1378373f7594','default','City has been created','App\\Models\\City','created','7537b612-0952-4c82-a50d-3dacd8223418',NULL,NULL,'{\"attributes\": {\"name\": \"مقبل\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ae81b389-ff17-4885-a223-14ec14c254ce','default','Origin has been updated','App\\Models\\Origin','updated','40e8dcfc-d87c-4958-aa4d-b17bb05110f3','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"sepated_services\": null}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\", \"sepated_services\": \"17 محل + حضانة \"}}',NULL,'2025-08-06 16:13:17','2025-08-06 16:13:17'),
('aeb16bee-af68-48bb-8d3e-6b3595f7e92c','default','City has been created','App\\Models\\City','created','0d0ebab9-d350-47cf-8d44-e845025bc2cb',NULL,NULL,'{\"attributes\": {\"name\": \"مدينة نصر\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('b006361d-6ae9-470f-b50d-5f355ee79367','default','Origin has been created','App\\Models\\Origin','created','e1562c3a-7959-4dcd-be89-3c1f3e145e39','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"شارع الحجاز تقسيم البداري\", \"used_area\": \"18\", \"project_id\": \"62ed8511-6163-4ca6-94a6-d9eb1b1964bc\", \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"121018.52\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"62\", \"total_area_coords\": \"132018.52\", \"executing_entity_num\": \"11000\", \"total_area_allocated\": \"132018.52\"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('b07f3705-3966-4bfa-bace-53f2a1c30bcd','default','User has been created','App\\Models\\User','created','8c82d771-63ae-4740-9ef8-b55a33b5821b',NULL,NULL,'{\"attributes\": {\"name\": \"SuperAdmin\", \"email\": \"superadmin@gmail.com\", \"status\": 1, \"password\": \"$2y$10$EM/Frxf1uKFRjIiZ3H3A4us/zn8QrxiNym1RiF93jxMzC9HltiwJC\", \"job_title_id\": null, \"phone_number\": \"01153447675\", \"department_id\": null, \"national_number\": \"29606011210931\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('b0beb664-8d20-43c4-8719-03f704c640c4','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"decision_image\": \"decision-images/6HquXKzsOv1fzCyMkmEUadkkno8Wg1A2euWwrSl4.pdf\"}, \"attributes\": {\"decision_image\": \"decision-images/JnSa1FptQFqbINRXhpimT5L3931UdyvabW5tWCje.png\"}}',NULL,'2025-05-05 12:24:47','2025-05-05 12:24:47'),
('b1577670-bbc9-42af-ace0-792852bba048','default','User has been updated','App\\Models\\User','updated','1a21e4dd-be52-4b40-b2d6-e73c17f28824','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"name\": \"مارى عادل عبده\"}, \"attributes\": {\"name\": \"مارى عادل\"}}',NULL,'2025-05-28 10:40:17','2025-05-28 10:40:17'),
('b2b2dcb1-9f19-4de9-948d-7d261b8a9a89','default','City has been created','App\\Models\\City','created','22dbb0f8-b95d-443c-a008-62a74d8adf5f',NULL,NULL,'{\"attributes\": {\"name\": \"المطرية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('b3f4045c-874b-423b-b29c-694010023a37','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/a86N9eKzD4FlCPTsU9aSWryUQq57sNa9stxNo81N.pdf\"}}',NULL,'2025-05-04 13:02:19','2025-05-04 13:02:19'),
('b4eec5bc-0471-4b94-8ba7-9c240d4875ea','default','City has been created','App\\Models\\City','created','b6802da6-978d-4147-b26f-b414e46cd8e4',NULL,NULL,'{\"attributes\": {\"name\": \"العياط\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('b5b815d3-9746-4370-861d-41357d43b044','default','Origin has been created','App\\Models\\Origin','created','d6daa189-76e8-40d5-86b5-4a7dd34e827a','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"سيف هيكل \", \"used_area\": \"50\", \"project_id\": \"83ce4a2a-cb44-4763-9d74-9b220a285c16\", \"decision_num\": \"66\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2018, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"96000\", \"executing_entity_num\": \"96000\", \"total_area_allocated\": \"96000\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('b5ecb264-d43b-4232-afb1-8f2e05537e91','default','City has been created','App\\Models\\City','created','cce9789d-7aa3-46f3-8e72-f46bd4d81b25',NULL,NULL,'{\"attributes\": {\"name\": \"أبنوب\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('b644b948-ae4f-42e8-9b1b-05f7527ef195','default','Project has been created','App\\Models\\Project','created','11c9bce4-bda1-4dc3-bfe3-df93fad563c7','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"مقر شالية بورتو مارينا غرفتين وصالة\"}}',NULL,'2025-05-06 09:37:23','2025-05-06 09:37:23'),
('b77d8328-7b48-47f9-b899-90aa4ddd03f9','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"old\": {\"location\": \"kjs,nhh\", \"created_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\"}, \"attributes\": {\"location\": \"kjs,nhh5\", \"created_by\": \"e28df551-c71f-4c6e-8d4f-27c75d870afa\"}}',NULL,'2025-06-02 11:05:29','2025-06-02 11:05:29'),
('b79491f4-1145-4ece-b1b5-94342d9162ce','default','City has been created','App\\Models\\City','created','676ee238-3a99-4080-bc40-5fc74f4b2659',NULL,NULL,'{\"attributes\": {\"name\": \"فلمينج\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('b7967ea2-2edf-4059-aea6-f280acf38941','default','OriginDetail has been created','App\\Models\\OriginDetail','created','60d8e65d-28ff-423f-ab19-6506d168a545','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-07 08:18:37','2025-08-07 08:18:37'),
('b866c32a-9b36-4f07-a6ca-8a97c1d3dacc','default','Origin has been created','App\\Models\\Origin','created','ad229b5b-7d4c-4e9f-b379-669fed924995','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم الاكتفاء بعدد 14 عمارة ويوجد مساحة شاغرة = 3524م2\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"التقسيم الحضري \", \"used_area\": \"14\", \"project_id\": \"83b33fa5-dce6-485f-b0ee-b3ad9f85ab12\", \"decision_num\": \"65\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2018, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"3524\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"24225\", \"executing_entity_num\": \"24225\", \"total_area_allocated\": \"24225\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('b8a52a5f-7d9d-4c83-8c82-de4149dfd0fc','default','City has been created','App\\Models\\City','created','d970cb5b-0d9d-4b42-a610-f7ee8e86d005',NULL,NULL,'{\"attributes\": {\"name\": \"نويبع\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('b8d62079-e3f3-4ab5-aea5-4addff6f3a6d','default','City has been created','App\\Models\\City','created','fa0f35c7-2fed-4a43-8818-9ff7902f9251',NULL,NULL,'{\"attributes\": {\"name\": \"القصاصين الجديدة\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('b920960b-9881-43ec-be4e-5352e59ecb27','default','City has been created','App\\Models\\City','created','7dc163a5-0b8b-4429-87d0-11ffb4fb8970',NULL,NULL,'{\"attributes\": {\"name\": \"الإسماعيلية\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('b9256b3c-8a56-4c7b-b9ed-d2369fc7ba3e','default','User has been updated','App\\Models\\User','updated','8477fe7e-9650-4e45-bc88-d9542d71cc53','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"job_title_id\": \"c969eed4-c2f2-4b5e-a831-d4e6208c5f84\", \"department_id\": \"40dd2d94-04ee-487d-8dad-ed3b21245d6a\"}}',NULL,'2025-04-29 10:59:59','2025-04-29 10:59:59'),
('b9f1b8fc-0423-43ab-b270-55b666a439bc','default','City has been created','App\\Models\\City','created','d270930d-5218-4efe-8a9e-e04ebad6d08b',NULL,NULL,'{\"attributes\": {\"name\": \"العاشر من رمضان\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('ba0cd16b-206e-45e6-a3f1-2ca08155b5b3','default','Project has been created','App\\Models\\Project','created','2e13f5e6-db0a-4917-af2f-cbe114ca966e','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 108 عمارة أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي – الغردقة\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('ba3d48ba-9437-4d29-ac42-d9d44238bc40','default','City has been created','App\\Models\\City','created','e5593815-0abf-4dcb-ad8e-147e0f9b1552',NULL,NULL,'{\"attributes\": {\"name\": \"أجا\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('ba71773d-34e6-4e27-b534-8a75894ef60a','default','City has been created','App\\Models\\City','created','fad636b2-44dc-4912-91a3-152a73a8c219',NULL,NULL,'{\"attributes\": {\"name\": \"بولاق الدكرور\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('bad5f807-8895-46d0-85e2-2b42c5181767','default','Responsibility has been created','App\\Models\\Responsibility','created','bada2f77-fa0f-4de2-889d-0ff7117ffb5d',NULL,NULL,'{\"attributes\": {\"name\": \"البعد المكاني\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('bb106f8d-ac36-4b89-b063-9f7f9aabcd4e','default','City has been created','App\\Models\\City','created','9eb1b79c-6893-4210-b0b6-a40e9501b1b5',NULL,NULL,'{\"attributes\": {\"name\": \"بلطيم\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('bbaa6629-d48a-41c3-bda6-c6a72fe0ba04','default','City has been created','App\\Models\\City','created','989e3116-6c5a-4c03-94db-8324af1b5590',NULL,NULL,'{\"attributes\": {\"name\": \"القطامية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('bbb45007-86bc-4ead-93df-9e42671ff7b0','default','City has been created','App\\Models\\City','created','b1d560c6-87be-4abc-a387-455c19d22341',NULL,NULL,'{\"attributes\": {\"name\": \"مدينة السادات\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('bc0802ba-e8f2-42c1-9529-6ba96a82563a','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"old\": {\"location\": \"testt\"}, \"attributes\": {\"location\": \"testtl\"}}',NULL,'2025-06-02 11:38:36','2025-06-02 11:38:36'),
('bc292978-87a5-41c4-b204-c1ecb528f846','default','City has been created','App\\Models\\City','created','d9bfd1f7-8f0a-48b6-a52b-2b8bd4051909',NULL,NULL,'{\"attributes\": {\"name\": \"الخليفة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('bc998c14-d0bf-465d-b23d-87e75c8bf445','default','City has been created','App\\Models\\City','created','643479bb-7585-41ce-9867-dbcfba6f5232',NULL,NULL,'{\"attributes\": {\"name\": \"إبشواي\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('bced87c0-440b-4108-b038-d1837a24f08f','default','Project has been created','App\\Models\\Project','created','5b61a48d-df8d-431c-9b26-6da06ded6061','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 19 عمارة تقسيم المركز السياحي – القصير\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('bd0fbfe7-a52d-406b-a574-715fc47c5f99','default','City has been created','App\\Models\\City','created','cb9c3cd0-4fa7-4bd5-a42f-66b24e8ec41d',NULL,NULL,'{\"attributes\": {\"name\": \"فيصل\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('bd7b70e0-c0f3-4311-a967-330153b34a40','default','City has been created','App\\Models\\City','created','7c360213-8a2b-4f61-b5ae-511800c34ca2',NULL,NULL,'{\"attributes\": {\"name\": \"إسنا\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('bd9305cc-325e-4c8e-9fd9-1c97fc222e6a','default','Origin has been created','App\\Models\\Origin','created','4bca70b4-8535-4889-90eb-1c73889e1ee7','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم دمج الثلاث مناطق \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"تقسيم القمر \", \"used_area\": \"22\", \"project_id\": \"44294172-144a-46d7-9eff-5bb89b99c899\", \"decision_num\": \"142\", \"statement_id\": \"114e446a-71c7-4e79-a6d5-0ddf770b7a8d\", \"decision_date\": 2014, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"55500\", \"executing_entity_num\": \"55500\", \"total_area_allocated\": \"55500\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('be25637a-318d-4330-b754-27f9aa19e735','default','City has been created','App\\Models\\City','created','cd1905e8-e4d1-49cc-9e55-a6eab1d33318',NULL,NULL,'{\"attributes\": {\"name\": \"محطة الرمل\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('be9244a3-0b21-4d3f-8a8c-a39e43c93a32','default','City has been created','App\\Models\\City','created','03795d48-6e37-417b-a120-eb39f14bd644',NULL,NULL,'{\"attributes\": {\"name\": \"التبين\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('bed6c306-8e32-443e-b89b-8bb2c621f5f3','default','City has been created','App\\Models\\City','created','644f083f-cd82-4794-8a46-36949725ef3c',NULL,NULL,'{\"attributes\": {\"name\": \"الرحاب\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('bee27f3c-a982-4b00-a80d-6d046556bf3f','default','City has been created','App\\Models\\City','created','e7c6502f-d985-4640-b29c-cd8d184ba769',NULL,NULL,'{\"attributes\": {\"name\": \"طره\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('bf0febef-3e3d-4aae-9f04-808c0d320c24','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": [[[579988.2689000006, 3011487.9699999997], [579757.7130000007, 3012349.5970000005], [579774.7020999992, 3012445.095], [579832.9656, 3012495.3189999997], [580078.0766000001, 3012574.749], [580221.5069000004, 3012080.434], [580730.3438, 3012261.427], [580759.8628999991, 3012121.305999999], [580364.9221999999, 3012028.5819999995], [580420.7804000003, 3011710.885], [580171.0343000008, 3011640.541], [580196.9350000003, 3011548.705], [579988.2689000006, 3011487.9699999997]], [[579403.5022000001, 3012039.003], [579544.0903000005, 3011562.6539999996], [579462.8074000003, 3011540.9019999993], [579284.8234999999, 3012144.71], [579688.6981999995, 3012431.3110000007], [579707.9531999999, 3012302.814], [579830.9615000001, 3011880.977], [579718.7779000003, 3011849.226999999], [579642.8422999998, 3012109.4449999994], [579403.5022000001, 3012039.003]]], \"total_area_coords\": \"629244.15172529\"}, \"attributes\": {\"coordinates\": [[[580297.2272999999, 3013561.4407999995], [579915.7889, 3013215.5752999997], [579819.6490999999, 3013357.2311000004], [579845.1014000009, 3013424.0996999997], [579842.9810000001, 3013587.7374999993], [580020.1236000004, 3013722.1534], [580080.5048000009, 3013646.1958999997], [580196.0027999997, 3013733.4082999993], [580297.2272999999, 3013561.4407999995]]], \"total_area_coords\": \"135995.58325966\"}}',NULL,'2025-05-29 12:51:36','2025-05-29 12:51:36'),
('bf8c355d-fb08-48f5-b001-d47cc67d5455','default','LockedOrigin has been created','App\\Models\\LockedOrigin','created','16e6ca71-a3d6-419d-8296-c55773f7294e','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"origin_id\": \"ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c\"}}',NULL,'2025-05-27 09:21:05','2025-05-27 09:21:05'),
('c0149a4b-e5c9-4783-ad98-73d65e1680c1','default','Project has been created','App\\Models\\Project','created','62ed8511-6163-4ca6-94a6-d9eb1b1964bc','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 80 عمارة بشارع الحجاز تقسيم البداري - الغردقة \"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('c0d3d1b3-4b56-4e3d-b315-b9e0f090b721','default','City has been created','App\\Models\\City','created','555f3287-b912-4c87-824e-188bbbc60c35',NULL,NULL,'{\"attributes\": {\"name\": \"الابراهيمية\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c13f0a5d-e77b-47b2-919d-aca687811440','default','City has been created','App\\Models\\City','created','14e79d3c-e643-4cf3-9588-f96a6dd935fa',NULL,NULL,'{\"attributes\": {\"name\": \"الداخلة\", \"government_id\": \"9d091593-1817-4565-9fe2-123eb626fc1d\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('c15757cc-1ab6-444e-befb-0e403c5a9702','default','City has been created','App\\Models\\City','created','b8ddfa0d-91fd-461f-a7a6-28f96e95afb3',NULL,NULL,'{\"attributes\": {\"name\": \"مرسى علم\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('c158521a-e5bb-46db-b9a3-5b39586732fe','default','City has been created','App\\Models\\City','created','602238e5-7fd6-48f9-ad32-8456489c7136',NULL,NULL,'{\"attributes\": {\"name\": \"مسطرد\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('c1d8d5d2-99ff-4089-a441-ddbb7cc2c8c1','default','City has been created','App\\Models\\City','created','a15d1d77-7bd5-49d7-96d5-ea27df996bdb',NULL,NULL,'{\"attributes\": {\"name\": \"شيراتون\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c21c57c0-d0ee-4800-adff-cc6caa53206c','default','Origin has been updated','App\\Models\\Origin','updated','d37f766e-6d40-4626-b592-b3b53b0188bd','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"615000\"}, \"attributes\": {\"coordinates\": [[[579988.2689, 3011487.969899999], [579757.7130000006, 3012349.5973], [579774.7020999995, 3012445.0951999994], [579832.9655999993, 3012495.3186000003], [580078.0766000001, 3012574.749], [580221.5068999999, 3012080.433899999], [580730.3438000005, 3012261.4273999985], [580759.8629000005, 3012121.3058000007], [580364.9221999993, 3012028.5818], [580420.7803999997, 3011710.8845], [580171.0343000008, 3011640.541], [580196.9349999997, 3011548.7047000006], [579988.2689, 3011487.969899999]], [[579403.5021999993, 3012039.0033000004], [579544.0902999997, 3011562.6544], [579462.8074000002, 3011540.9017], [579284.8234999999, 3012144.7095999983], [579688.6981999996, 3012431.3108], [579707.9531999996, 3012302.8137999997], [579830.9614999999, 3011880.976599999], [579718.7779000001, 3011849.2266], [579642.8423000001, 3012109.4447999997], [579403.5021999993, 3012039.0033000004]]], \"total_area_coords\": \"629244.31147038\"}}',NULL,'2025-05-29 12:47:19','2025-05-29 12:47:19'),
('c269ba0d-a701-4dd6-9386-39add393c3d2','default','OriginDetail has been created','App\\Models\\OriginDetail','created','401776c4-a259-4a65-a922-bd3ba5b6f779','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc\", \"unit_area\": \"90.00\", \"number_of_units\": 140, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 136, \"administrative_units\": 4, \"number_of_buildings_executed\": 7}}',NULL,'2025-08-06 16:09:22','2025-08-06 16:09:22'),
('c2cdc821-97e1-4772-9562-d87b3a7cdce6','default','City has been created','App\\Models\\City','created','bc79f2be-5597-4424-8f02-e288a477c24e',NULL,NULL,'{\"attributes\": {\"name\": \"حلايب\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('c2ebe230-f5bb-4cc9-8300-471b796c1be2','default','Origin has been updated','App\\Models\\Origin','updated','40e8dcfc-d87c-4958-aa4d-b17bb05110f3','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"50\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"96000\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"used_area\": \"96000\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"50\"}}',NULL,'2025-05-04 12:46:27','2025-05-04 12:46:27'),
('c31378ef-5d9d-4409-94d9-bb4e3c33209d','default','City has been created','App\\Models\\City','created','887770c4-7e44-4723-ac2a-42cafd5b106b',NULL,NULL,'{\"attributes\": {\"name\": \"الازبكية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('c3955cbd-2057-410c-a39d-5e3877a53922','default','City has been created','App\\Models\\City','created','5965b7d5-966c-4118-8bd5-ae73f0c3befe',NULL,NULL,'{\"attributes\": {\"name\": \"العبور\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('c3ee6fbe-c97d-4d29-8b7c-505adf367b50','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"revised_by\": null, \"origin_status\": \"inprogress\"}, \"attributes\": {\"revised_by\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"origin_status\": \"revision\"}}',NULL,'2025-06-02 06:52:20','2025-06-02 06:52:20'),
('c433dfc7-919b-45a8-8a74-bf07930e0230','default','City has been created','App\\Models\\City','created','6cae1c30-e2dd-49da-8429-ae8d7eda6c0f',NULL,NULL,'{\"attributes\": {\"name\": \"طما\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('c4696f03-bd87-40b5-9d72-8ee2dbbadba8','default','City has been created','App\\Models\\City','created','734ac380-768f-4a1f-9e45-f0027f5f2737',NULL,NULL,'{\"attributes\": {\"name\": \"الشرابية\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('c4c53c00-b66e-4a28-a561-12f5987363cb','default','City has been created','App\\Models\\City','created','e493d912-9924-4237-8da1-f35c69f01c77',NULL,NULL,'{\"attributes\": {\"name\": \"قصر النيل\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c4e0b294-c26d-40bb-b383-b4d2916d2062','default','Project has been created','App\\Models\\Project','created','30d550ac-cf60-40c6-895a-8dbb7cfa2528','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 1200 وحدة تقسيم فلامنكو المنطقة الثانية – القصير\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('c619db50-9ba6-4892-9dc7-b627adc6051c','default','City has been created','App\\Models\\City','created','00d3156a-49f0-476d-b126-6a20a8ac8bdc',NULL,NULL,'{\"attributes\": {\"name\": \"أبو زنيمة\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('c646473a-23c7-45b6-a40f-8c7166fb1baf','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"decision_image\": \"decision-images/6UgBbjJf0RShBdzTNEhMQbS5D6kGGciLjB4XNaZy.xlsx\"}, \"attributes\": {\"decision_image\": \"decision-images/SBnTSheyUDaAhgwKT8t8KnFnNe8K32VaAVcwAKEI.xlsx\"}}',NULL,'2025-05-07 08:58:17','2025-05-07 08:58:17'),
('c69d610b-ac96-406c-a0af-68cb153d8108','default','City has been created','App\\Models\\City','created','b8b1dc59-c155-4b10-ac5f-661dc4759090',NULL,NULL,'{\"attributes\": {\"name\": \"وسط البلد\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c83ce445-2fae-409e-8b18-b753497580af','default','City has been created','App\\Models\\City','created','78a0bec3-3da6-4758-851f-1e87acb6e131',NULL,NULL,'{\"attributes\": {\"name\": \"الدهار\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('c84259fc-ca6f-47e4-8f39-e465939fd15b','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999975]], \"total_area_coords\": \"135995.60650332\"}, \"attributes\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999956]], \"total_area_coords\": \"135995.60650312\"}}',NULL,'2025-05-29 09:02:41','2025-05-29 09:02:41'),
('c855dd1b-9362-465a-a30f-17cb1a2c539c','default','City has been created','App\\Models\\City','created','a7c288ad-8aca-44a0-9b3a-89858eadcc13',NULL,NULL,'{\"attributes\": {\"name\": \"ارض سلطان\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('c86f853f-df06-4ebe-bd30-0e712627acd4','default','City has been created','App\\Models\\City','created','d093fe9b-c428-4279-9f3e-1f7685135093',NULL,NULL,'{\"attributes\": {\"name\": \"الأزاريطة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c8ca2062-7f66-43f5-a7f1-e9d98ba53142','default','Project has been created','App\\Models\\Project','created','71c98ba6-5cf3-4553-9a36-d27fe6a8350b','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"مقر شالية بورتو السخنة - نموذج A - منقرع\"}}',NULL,'2025-05-06 09:38:42','2025-05-06 09:38:42'),
('c95dbeca-f9c0-4de1-b5fd-9d19dc08eca3','default','City has been created','App\\Models\\City','created','4f508f96-4abd-4bf0-811b-ba3b393d06e3',NULL,NULL,'{\"attributes\": {\"name\": \"أسيوط\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('c9f8b3bc-65f2-40e1-9c31-a58ecd55105b','default','Origin has been created','App\\Models\\Origin','created','05c3e92e-ab0e-4394-8add-5fc0b9287a53','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"notes\": \"مملوكة\", \"city_id\": \"ff89b1ba-cfbe-426c-aa9e-e97f22bd62d5\", \"location\": \"الوحدة رقم (20704) الدور السابع فوق الأرضي نموذج B المبني الهرمي المسمي (خفرع)\", \"used_area\": \"100\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"project_id\": \"05b12ba5-a111-42f2-8a20-e5b0cff856ab\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"0\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"decision_date\": 2020, \"government_id\": \"1a99feee-6a40-4988-a798-8c11978358df\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"accept\", \"decision_type_id\": \"29887624-b6dd-4630-900f-a1f73d1e80c8\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"100\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"100\"}}',NULL,'2025-05-06 09:48:09','2025-05-06 09:48:09'),
('ca0c74e9-d5c7-4ebd-baf8-4051ce6d391b','default','City has been created','App\\Models\\City','created','6a0a5bf6-7e84-4631-abd6-9e2e1fcd1813',NULL,NULL,'{\"attributes\": {\"name\": \"وسط البلد كفر الشيخ\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('ca0e4d99-3fbc-47e4-a837-e8dca9b0be70','default','City has been created','App\\Models\\City','created','37c5658d-3def-4c1a-9b3c-9813486fcd2d',NULL,NULL,'{\"attributes\": {\"name\": \"بني سويف\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ca1c0611-c740-476e-974b-cfffc395a4b1','default','City has been created','App\\Models\\City','created','d141db53-8921-4ebb-b564-8e4ee12929d9',NULL,NULL,'{\"attributes\": {\"name\": \"بلبيس\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('ca273c4b-0564-4d22-a3c9-159b8ee73b31','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": [[574720.4207, 3018896.8962999997], [574559.346700001, 3018619.605900001], [574242.0389000006, 3018812.1655999995], [574440.9329000001, 3019155.2202999997], [574622.9824000001, 3019053.5445999987], [574586.7776999995, 3018994.2469999995]], \"total_area_coords\": \"137029.98108406\"}, \"attributes\": {\"coordinates\": [[[574720.4207, 3018896.8962999997], [574559.346700001, 3018619.605900001], [574242.0389000006, 3018812.1655999995], [574440.9329000001, 3019155.2202999997], [574622.9824000001, 3019053.544599998], [574586.7776999995, 3018994.2469999995], [574720.4207, 3018896.8962999997]]], \"total_area_coords\": \"137029.98108395\"}}',NULL,'2025-05-29 11:35:17','2025-05-29 11:35:17'),
('ca555dc5-fe6d-4c06-9f1b-a72da4c6ff89','default','Department has been created','App\\Models\\Department','created','d0212885-f294-43c8-9585-ac2f87861755',NULL,NULL,'{\"attributes\": {\"name\": \"المكتب الفني\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('cab4a430-80e9-4e42-bdd9-a3f61cdfd464','default','Origin has been created','App\\Models\\Origin','created','c4463e50-9496-49e7-b8f2-a6750cf60035','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"شرق طريق الشرطة العسكرية \", \"used_area\": \"0\", \"project_id\": \"8cb7e1e6-0162-427b-be2d-12fede2aea08\", \"decision_num\": \"971\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2023, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"297250\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"297250\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('cabd9746-e132-4689-9c58-d1cb5f666570','default','OriginDetail has been created','App\\Models\\OriginDetail','created','22c9c37d-4d9e-41cb-b8d7-fa8ce865e2a8','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 700, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 700, \"administrative_units\": null, \"number_of_buildings_executed\": 35}}',NULL,'2025-08-07 08:40:44','2025-08-07 08:40:44'),
('cae18ded-6ca4-4d2a-b350-4c79b5d0844e','default','City has been created','App\\Models\\City','created','fd1e88e4-6ab3-4fdf-8a23-61528ddbea88',NULL,NULL,'{\"attributes\": {\"name\": \"القنطرة شرق\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('cb132435-61bb-4b3d-8e34-4bc1e74496d7','default','City has been created','App\\Models\\City','created','d23f791c-97ff-4a11-9f8a-5a458a552acb',NULL,NULL,'{\"attributes\": {\"name\": \"المنتزه\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('cb137fbf-e92a-422b-a1f1-279de702879e','default','City has been created','App\\Models\\City','created','c215889d-bd2f-46a1-9acc-f728ba1c5c86',NULL,NULL,'{\"attributes\": {\"name\": \"سيدي غازي\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('cb2ef542-6e51-48fb-ae5b-611bd9de8efa','default','City has been created','App\\Models\\City','created','bc88629a-d83d-411d-aac7-28c778e156b0',NULL,NULL,'{\"attributes\": {\"name\": \"منشية ناصر\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('cb385bc2-58f6-4464-be2e-b2ff7c00d259','default','City has been created','App\\Models\\City','created','a9a91a5e-05e5-47f8-885c-dbb12b575ba0',NULL,NULL,'{\"attributes\": {\"name\": \"صدفا\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('cba26549-8296-4589-b5ed-0c326a8d5c5e','default','City has been created','App\\Models\\City','created','b2ff0038-11d6-4462-b6c3-957fd55115da',NULL,NULL,'{\"attributes\": {\"name\": \"الباويطي\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('cbc1974c-c7f9-456e-af6c-daf9f88ae1f4','default','City has been created','App\\Models\\City','created','838c1042-02aa-4f1a-b6fb-fb824b02d5a9',NULL,NULL,'{\"attributes\": {\"name\": \"عابدين\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('cc0cc451-2022-4c4b-a0b8-f993615b0a80','default','City has been created','App\\Models\\City','created','45590221-793d-40bf-aa47-f59aa9cf6a31',NULL,NULL,'{\"attributes\": {\"name\": \"ناصر\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('cc0fe34a-2aa0-470b-9ffb-36fb6cdd4016','default','Origin has been created','App\\Models\\Origin','created','76239f32-c43c-4161-88ab-903624bf99ae','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"شرق طريق الشرطة العسكرية \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"8cb7e1e6-0162-427b-be2d-12fede2aea08\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"971\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2023, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"297250\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"297250\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('cd07237b-ac26-4e76-a8f3-933bf586d15a','default','City has been created','App\\Models\\City','created','2a54516c-afed-421d-86a1-12bd9cd7506d',NULL,NULL,'{\"attributes\": {\"name\": \"المنشأة\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('cd77be9c-22a7-4680-957f-ddf88130077e','default','City has been created','App\\Models\\City','created','9bfdc4e9-d168-4b82-906d-70c97fb26410',NULL,NULL,'{\"attributes\": {\"name\": \"برج البرلس\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('ce172e43-a33c-4a7e-814e-0d540c1a4aaa','default','OriginDetail has been created','App\\Models\\OriginDetail','created','01ff86f9-66a0-4627-8b10-bd06aa4cca7d','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 5100, \"administrative_units\": null, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-07 08:40:44','2025-08-07 08:40:44'),
('ce433718-5f39-4bdf-9c9b-9c0473e620a7','default','City has been created','App\\Models\\City','created','d4cd88a6-42eb-48ad-9cbc-12feadddad77',NULL,NULL,'{\"attributes\": {\"name\": \"ميت أبو غالب\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('ce73ea4b-5b63-47a2-bc3c-18aaef3d1609','default','City has been created','App\\Models\\City','created','b8d90cb4-3ef8-437f-b9b6-dca5fddee3c0',NULL,NULL,'{\"attributes\": {\"name\": \"مشتول السوق\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('ce9e274e-33fe-4c11-99b5-f1999e2ff4c9','default','City has been created','App\\Models\\City','created','ae8d2003-5989-4636-8404-685a1574a269',NULL,NULL,'{\"attributes\": {\"name\": \"منية النصر\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('ceaba4f5-43e0-4143-bfc8-af4478199526','default','Origin has been updated','App\\Models\\Origin','updated','d37f766e-6d40-4626-b592-b3b53b0188bd','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"300\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"568330\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"used_area\": \"568330\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"300\"}}',NULL,'2025-05-04 11:42:43','2025-05-04 11:42:43'),
('cedaf667-04b5-461c-b6fd-c025cf896000','default','Project has been created','App\\Models\\Project','created','2620cf73-50b0-49e2-9f8f-1c3bb68a3e9a','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 80 عمارة بشارع الحجاز تقسيم البداري – الغردقة\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('cee83da1-7d56-43c7-9c94-6acdf9029182','default','City has been created','App\\Models\\City','created','bce4818c-eddb-442a-b630-96e0d552a3e4',NULL,NULL,'{\"attributes\": {\"name\": \"العجوزة\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('cf37fc8e-08ee-4dd4-883f-5952cb5a825a','default','City has been created','App\\Models\\City','created','fcbdbea2-1d2d-494b-9e44-3526b8d6badf',NULL,NULL,'{\"attributes\": {\"name\": \"المقطم\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('d03aa02c-5c38-4aac-9a71-156ca232ac87','default','City has been created','App\\Models\\City','created','01db473a-1112-4aac-afad-bc976c36162d',NULL,NULL,'{\"attributes\": {\"name\": \"الكردي\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d051675d-21b8-4bca-8a2a-e3932f2b9105','default','City has been created','App\\Models\\City','created','235d650f-1d35-4a49-a32b-b136a9871679',NULL,NULL,'{\"attributes\": {\"name\": \"سيدي جابر\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d0be51cb-cc0e-40ce-9f0c-eaa408112346','default','City has been created','App\\Models\\City','created','bdd61697-667c-4d61-ad0d-7598221dc607',NULL,NULL,'{\"attributes\": {\"name\": \"طيبة الجديدة\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('d11bef92-12ed-445e-a361-1cb2bcfb3319','default','City has been created','App\\Models\\City','created','12430d62-b6cd-402f-9931-c6cc605dae96',NULL,NULL,'{\"attributes\": {\"name\": \"مصر القديمة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('d1995f95-1e91-4bd0-a1d7-6e4f85e2b8ce','default','Government has been created','App\\Models\\Government','created','26b500a4-c361-4418-976f-31d769b44d24',NULL,NULL,'{\"attributes\": {\"name\": \"اسوان\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d1a11e0f-2cd1-4a14-a131-109ed2289bb5','default','Origin has been created','App\\Models\\Origin','created','0bf2f408-7733-47f9-8805-9847cc3408cd','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم الحجاز منطقة أبوعشرة الطريق الدائري \", \"used_area\": \"0\", \"created_by\": null, \"project_id\": \"716e0bae-b7f4-4f7b-baa7-4d40c76d9ab0\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"568\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2021, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"610977\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"500\", \"total_area_coords\": \"910977\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"610977\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('d1c07a59-52ac-4110-b591-1747a0de6a66','default','City has been created','App\\Models\\City','created','64c400da-8920-4716-85dc-9cadae26ea1b',NULL,NULL,'{\"attributes\": {\"name\": \"مطاي\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d1d2a503-979f-438c-aedb-d8dc8ffbb6df','default','City has been created','App\\Models\\City','created','e7d29eed-80b9-4f4d-8d9e-f9871e2e2dfd',NULL,NULL,'{\"attributes\": {\"name\": \"ابو قير\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('d1f075a6-d167-4375-a3ef-d7bfa3b363cc','default','City has been created','App\\Models\\City','created','04366409-7a20-451f-bdd4-3c4719f947e2',NULL,NULL,'{\"attributes\": {\"name\": \"دير مواس\", \"government_id\": \"3995d987-3263-460b-b453-a62c21fd6050\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d1f77547-7cf0-4115-9812-6ff5de41c477','default','City has been created','App\\Models\\City','created','22ee77c0-099a-4216-a44f-d43e552ff3cd',NULL,NULL,'{\"attributes\": {\"name\": \"الإبراهيمية\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('d275a88c-9ca2-409b-a7d1-49baa0180df6','default','Statement has been updated','App\\Models\\Statement','updated','114e446a-71c7-4e79-a6d5-0ddf770b7a8d','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"name\": \"الجهاز المركزي للتعمير - مديرية الإسكان والمرافق بمحافظة البحر الأحمر \"}, \"attributes\": {\"name\": \"الجهاز المركزي للتعمير - جهاز تعمير البحر الأحمر  \"}}',NULL,'2025-06-16 07:37:09','2025-06-16 07:37:09'),
('d278109a-c7ba-4ed2-ac8b-ae3d90fe57df','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"total_area_coords\": \"135995.60650353\"}, \"attributes\": {\"total_area_coords\": \"135995.60650346\"}}',NULL,'2025-05-25 07:30:11','2025-05-25 07:30:11'),
('d2926014-57f1-4cf2-956c-2c538837ae24','default','City has been created','App\\Models\\City','created','d036869f-457f-4f09-ba89-689245e1e431',NULL,NULL,'{\"attributes\": {\"name\": \"زفتى\", \"government_id\": \"894cb001-e9b0-43bf-8bcf-db953ebc4e98\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('d29ee95d-ee1d-4d5a-a1f7-3614ec18ed95','default','City has been created','App\\Models\\City','created','5a188693-977c-4afa-b795-0d17dc7133ba',NULL,NULL,'{\"attributes\": {\"name\": \"الخانكة\", \"government_id\": \"eb94b50e-1cc5-45bc-bfed-39edd60acb33\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d3790c1f-51b7-4c0d-ba6f-0fd4140fbdf4','default','City has been created','App\\Models\\City','created','9a9c0f12-f9bf-46cf-bf0a-3e4dddadcd75',NULL,NULL,'{\"attributes\": {\"name\": \"الأقصر الجديدة\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('d39faa3b-5658-4f5e-863a-83caa672133b','default','City has been created','App\\Models\\City','created','5c95a5bf-c8ea-47a1-a981-1545edfa4943',NULL,NULL,'{\"attributes\": {\"name\": \"أسوان\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d3ac06f1-ec80-4941-95b9-fb286b1fa7f8','default','Government has been created','App\\Models\\Government','created','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8',NULL,NULL,'{\"attributes\": {\"name\": \"اسيوط\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d44586ee-992d-4274-a9ca-2ec4b74da2d3','default','City has been created','App\\Models\\City','created','f51add73-ee2c-4fee-8a8c-219a59344db6',NULL,NULL,'{\"attributes\": {\"name\": \"ستانلى\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d4c15292-e157-42bf-a2d9-d27cb152b97a','default','City has been created','App\\Models\\City','created','d412f8c7-0624-4e39-85aa-f25da4ab9706',NULL,NULL,'{\"attributes\": {\"name\": \"نقادة\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('d5009f6a-1f48-4568-9ef3-c2e0048bc945','default','City has been created','App\\Models\\City','created','9bec9209-59b4-47fd-9b88-9cda58b49e00',NULL,NULL,'{\"attributes\": {\"name\": \"مدينة الشروق\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('d63ace00-5999-4ecf-9431-c03bb075540e','default','Origin has been updated','App\\Models\\Origin','updated','d37f766e-6d40-4626-b592-b3b53b0188bd','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"sepated_services\": null}, \"attributes\": {\"created_by\": \"b7ff04c9-2447-4ab7-959b-80934f5a6fc3\", \"sepated_services\": \"عدد 57 محل + عدد 7 مخابز + عدد 9 صيدليات + عدد 6 حضانات + مول تجاري وإداري (عدد 20 محل + عدد 15 وحدة إدارية) \"}}',NULL,'2025-08-06 15:33:41','2025-08-06 15:33:41'),
('d643f245-58fb-4998-b51b-2075fd450985','default','City has been created','App\\Models\\City','created','0ee1ef37-c18d-4473-ae28-dbc6f11d2b05',NULL,NULL,'{\"attributes\": {\"name\": \"العلمين\", \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('d67eb9d0-f1a5-46b3-9fe9-3ef88cd68326','default','EditRequestOrigin has been created','App\\Models\\EditRequestOrigin','created','3d6dca50-b049-4e3d-82fe-c7976f74cfc9','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"status\": \"pending\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"origin_id\": \"ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c\"}}',NULL,'2025-05-27 09:22:00','2025-05-27 09:22:00'),
('d68fe4b6-cbb6-4cee-9a2c-5f31a871c015','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"origin_status\": \"revision\"}, \"attributes\": {\"origin_status\": \"inprogress\"}}',NULL,'2025-05-04 03:45:37','2025-05-04 03:45:37'),
('d71fd68d-a95f-4a7f-8c8b-6b6af828c85b','default','Origin has been updated','App\\Models\\Origin','updated','c7450ead-7746-4f32-a04f-7f4bd11df995','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_image\": null}, \"attributes\": {\"decision_image\": \"decision-images/7DUuBCmyoyNNh8HHgBnpev4VLw47TXFveTJuK8oz.pdf\"}}',NULL,'2025-05-04 13:31:30','2025-05-04 13:31:30'),
('d73db87e-a401-4df9-9061-5424c612db7c','default','Origin has been created','App\\Models\\Origin','created','cf4973f3-03cc-4170-9da3-09e17bd88ca4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"شارع الحجاز تقسيم البداري\", \"used_area\": \"18\", \"created_by\": null, \"project_id\": \"2620cf73-50b0-49e2-9f8f-1c3bb68a3e9a\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"63\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2020, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"121018.52\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"62\", \"total_area_coords\": \"132018.52\", \"executing_entity_num\": \"11000\", \"total_area_allocated\": \"132018.52\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('d85f5b49-3bda-4d65-bda9-4e3f5ec9ac77','default','City has been created','App\\Models\\City','created','823f61c9-ea66-46e6-952b-dd280d24cce0',NULL,NULL,'{\"attributes\": {\"name\": \"أبو المطامير\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('d8f59887-d54e-4e37-bb63-20847324b306','default','City has been created','App\\Models\\City','created','5d1032a0-d825-4788-8b54-ff16b3b727e9',NULL,NULL,'{\"attributes\": {\"name\": \"الغنايم\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d8fbebb1-172c-485c-8816-b5689bea7c10','default','City has been created','App\\Models\\City','created','faecd0a1-34d8-41d0-87bb-6c7aeb6e0fbc',NULL,NULL,'{\"attributes\": {\"name\": \"قنا الجديدة\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('d925db03-56dd-4f2b-a944-b3064e681506','default','City has been created','App\\Models\\City','created','ca5391d8-9bbf-45eb-b8fa-6920f8ceecaf',NULL,NULL,'{\"attributes\": {\"name\": \"الشاطبي\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d95f4dfd-bdf1-41c7-8761-6abbdb9a8da3','default','City has been created','App\\Models\\City','created','02d0728f-32d5-4b1f-8c06-283ee9564c05',NULL,NULL,'{\"attributes\": {\"name\": \"كلابشة\", \"government_id\": \"26b500a4-c361-4418-976f-31d769b44d24\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('da683b5e-c317-47c0-a80d-a85c25b84887','default','City has been created','App\\Models\\City','created','eaa6abe6-3e11-4d2e-8d68-1d47c980f49c',NULL,NULL,'{\"attributes\": {\"name\": \"العرب\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('db813070-22a7-4aab-949a-0e9376775eba','default','User has been created','App\\Models\\User','created','8477fe7e-9650-4e45-bc88-d9542d71cc53',NULL,NULL,'{\"attributes\": {\"name\": \"رامى عبد الصادق\", \"email\": \"ramyabdelsadek@gmail.com\", \"status\": 1, \"password\": \"$2y$10$sTzfocrSe0cNC/q5L9lY6eqZVXj2XfXORSn6x.bZquDOXtGk7v2Hu\", \"job_title_id\": null, \"phone_number\": \"01007755011\", \"department_id\": null, \"national_number\": \"28508030300059\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('db8afe5f-f0f0-464d-bcaa-2dec4522e788','default','City has been created','App\\Models\\City','created','4db15570-6799-4b2c-9463-a03c5fa2ca96',NULL,NULL,'{\"attributes\": {\"name\": \"برج العرب\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('dc88c349-18d0-466c-81aa-ca1dcb8bb4f5','default','Origin has been updated','App\\Models\\Origin','updated','0fcbcbd8-1c21-4799-ad3a-e02975839dd6','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"22867.47\"}, \"attributes\": {\"coordinates\": [[[626635.7019000005, 2890151.0807], [626742.2852000012, 2890224.3729999997], [626823.3108000002, 2890143.474899998], [626770.1450999997, 2890107.0467000008], [626852.2687999993, 2889977.7246999997], [626836.4910000004, 2889967.9222], [626753.0392999998, 2889985.956399999], [626635.7019000005, 2890151.0807]]], \"total_area_coords\": \"26105.469879629\"}}',NULL,'2025-05-29 13:03:30','2025-05-29 13:03:30'),
('dcb0d064-b455-4d22-a3ec-fc73aaba60fd','default','OriginDetail has been created','App\\Models\\OriginDetail','created','a0b1001b-9541-4d7b-a909-23cf0ef40832','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 5100, \"administrative_units\": null, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-07 08:43:14','2025-08-07 08:43:14'),
('dd6783e0-1b2b-4399-8392-544595ac8f49','default','OriginDetail has been created','App\\Models\\OriginDetail','created','4f5d1cf4-791e-49da-a044-034be01b3149','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 5100, \"administrative_units\": null, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-07 08:18:01','2025-08-07 08:18:01'),
('ddb72f49-4b7d-40fd-b642-31611566853c','default','City has been created','App\\Models\\City','created','4512d5ab-c334-4982-abe3-7c5aa4ea596e',NULL,NULL,'{\"attributes\": {\"name\": \"المنزلة\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('ddde41ec-ce46-43d2-8aff-fcc97dbb61e1','default','City has been created','App\\Models\\City','created','2060be05-83a9-4f77-9699-3865a111b7dd',NULL,NULL,'{\"attributes\": {\"name\": \"الحادقة\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('de132b50-5484-4f7d-ace5-a65c77b54988','default','DecisionType has been created','App\\Models\\DecisionType','created','29887624-b6dd-4630-900f-a1f73d1e80c8','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"مجلس إدارة الصندوق\"}}',NULL,'2025-05-06 09:44:04','2025-05-06 09:44:04'),
('de1994a1-2d80-4120-ad42-906b645bdc7c','default','City has been created','App\\Models\\City','created','68a56a49-a376-4302-ae49-809ae670f153',NULL,NULL,'{\"attributes\": {\"name\": \"نفيشة\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('de49810c-b675-4278-836d-f749a15c5387','default','City has been created','App\\Models\\City','created','0a8af707-f037-4ee2-9f77-41735cac6e51',NULL,NULL,'{\"attributes\": {\"name\": \"وادي النطرون\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('de82d216-a5e4-49b0-a7a7-03244b911d61','default','Government has been created','App\\Models\\Government','created','c4dbc8e7-549e-4bce-ae29-91c736a8ff33',NULL,NULL,'{\"attributes\": {\"name\": \"الفيوم\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('de9c2927-640a-45a8-be6c-d179607f250f','default','Project has been created','App\\Models\\Project','created','05b12ba5-a111-42f2-8a20-e5b0cff856ab','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"name\": \"مقر شالية بورتو السخنة - نموذج B- خفرع\"}}',NULL,'2025-05-06 09:38:54','2025-05-06 09:38:54'),
('df9d5041-725c-4fda-a981-1328d754000b','default','City has been created','App\\Models\\City','created','60557166-a7cd-4d31-b0b2-1064ba6119b5',NULL,NULL,'{\"attributes\": {\"name\": \"قلين\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('dfeb0aa3-4fde-481f-b47c-bc53c8bd4312','default','Origin has been created','App\\Models\\Origin','created','0fcbcbd8-1c21-4799-ad3a-e02975839dd6','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم المركز السياحي \", \"used_area\": \"19\", \"created_by\": null, \"project_id\": \"5b61a48d-df8d-431c-9b26-6da06ded6061\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"781\", \"statement_id\": \"bae76f11-3713-4690-b9e7-5cfd27d252f8\", \"decision_date\": 2012, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"22867.47\", \"executing_entity_num\": \"22867.47\", \"total_area_allocated\": \"22867.47\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('e08eec6f-c606-4757-b1e9-a888e139c8e6','default','Government has been created','App\\Models\\Government','created','f183d7eb-93c2-4a9d-8a0b-80f97292f436',NULL,NULL,'{\"attributes\": {\"name\": \"الأقصر\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('e0974442-f61b-4224-bbe2-20d3931b34cd','default','Origin has been created','App\\Models\\Origin','created','265de0be-60a1-4a82-8108-d5c7a2b13204','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"notes\": \"مملوكة\", \"city_id\": \"ff89b1ba-cfbe-426c-aa9e-e97f22bd62d5\", \"location\": \"الوحدة رقم (30806) الدور الثامن فوق الأرضي نموذج A المبني الهرمي المسمي (منقرع)\", \"used_area\": \"110\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"project_id\": \"71c98ba6-5cf3-4553-9a36-d27fe6a8350b\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"0\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"decision_date\": 2020, \"government_id\": \"1a99feee-6a40-4988-a798-8c11978358df\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"accept\", \"decision_type_id\": \"29887624-b6dd-4630-900f-a1f73d1e80c8\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"110\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"110\"}}',NULL,'2025-05-06 09:49:38','2025-05-06 09:49:38'),
('e0e490c4-57e5-49ae-8950-313e3a25fd81','default','City has been created','App\\Models\\City','created','d5d980ec-e014-4705-b7b1-19d3d60a5ac6',NULL,NULL,'{\"attributes\": {\"name\": \"السويس\", \"government_id\": \"1a99feee-6a40-4988-a798-8c11978358df\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('e176b42d-fe88-4c07-b503-b490440cfdff','default','OriginDetail has been created','App\\Models\\OriginDetail','created','14ff852e-593b-4957-b086-6c790f8c5f93','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 360, \"commercial_shops\": 40, \"commercial_units\": 10, \"residential_units\": 360, \"administrative_units\": null, \"number_of_buildings_executed\": 18}}',NULL,'2025-08-06 15:51:52','2025-08-06 15:51:52'),
('e199759d-0b77-4090-9898-00e2ace84237','default','City has been created','App\\Models\\City','created','61428bd7-c634-4b62-8a02-ae7ccde41c1f',NULL,NULL,'{\"attributes\": {\"name\": \"السيوف\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e22182de-b176-427b-ba1d-587b5d37b0e7','default','City has been created','App\\Models\\City','created','bb11f973-2fb8-4e7e-8acf-636f073d5b07',NULL,NULL,'{\"attributes\": {\"name\": \"حدائق الأهرام\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e22a54ac-e50a-4295-8d62-e5423b8c5686','default','City has been created','App\\Models\\City','created','1806ef87-a011-4249-8ead-340efb5fe9c2',NULL,NULL,'{\"attributes\": {\"name\": \"المعمورة\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('e2b90b8e-988e-456d-a164-6b906399a0ee','default','City has been created','App\\Models\\City','created','fbc60a7a-c865-458b-be3f-5adb72b039eb',NULL,NULL,'{\"attributes\": {\"name\": \"شبراخيت\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('e354a825-09cd-4b07-a061-aa2ded8ae907','default','City has been created','App\\Models\\City','created','079d6d62-84a4-47c5-aef5-8ee8ef712763',NULL,NULL,'{\"attributes\": {\"name\": \"سرس الليان\", \"government_id\": \"4ed06fcc-ca0f-4161-b6f8-6fea29f8b658\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('e3b3107d-2526-4197-b908-170af8cfdf05','default','City has been created','App\\Models\\City','created','4f07eb23-9dbc-42c0-a938-0deeff431203',NULL,NULL,'{\"attributes\": {\"name\": \"الصف\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e5960987-b2ef-47cd-841d-7809254ce755','default','Project has been created','App\\Models\\Project','created','f03430e9-947b-46e2-bb6f-3bf1cb8ea534','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 108 عمارة أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي - الغردقة \"}}',NULL,'2025-04-29 11:09:22','2025-04-29 11:09:22'),
('e5ba307f-ad53-403a-87c5-bda9e42ced9a','default','City has been created','App\\Models\\City','created','963283e6-24ba-4614-9dca-b28d51661ac0',NULL,NULL,'{\"attributes\": {\"name\": \"الاباصيرى\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('e646edb5-cd34-4471-81bf-19052a140d9e','default','City has been created','App\\Models\\City','created','039d9f6f-a971-4ca3-aa0e-a4388d911cbf',NULL,NULL,'{\"attributes\": {\"name\": \"الكيت كات\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e6804db9-1a15-46f4-903b-de7c4bf0ee9f','default','City has been created','App\\Models\\City','created','436a5f74-4e3d-4f0a-a540-21e1b7404dae',NULL,NULL,'{\"attributes\": {\"name\": \"الوراق\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e70caf4d-363c-482d-ad23-a478658000be','default','City has been created','App\\Models\\City','created','32e39523-947e-4229-a963-ec1b880e7584',NULL,NULL,'{\"attributes\": {\"name\": \"البياضية\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('e72c339b-38db-459c-8cee-948ef73237d5','default','Responsibility has been created','App\\Models\\Responsibility','created','2457e895-0419-446e-b2cc-be4d02ea30af',NULL,NULL,'{\"attributes\": {\"name\": \"المديونيات\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('e76b4b45-7aaf-4d6b-bcba-e6540e4f739e','default','City has been created','App\\Models\\City','created','cf2a1765-4698-4ec0-82bd-68c420b8569d',NULL,NULL,'{\"attributes\": {\"name\": \"العريش\", \"government_id\": \"fd597d05-e8ca-4c88-a270-dedf07e8bade\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('e81368ae-73b9-478d-924d-9f55e53a669c','default','Origin has been updated','App\\Models\\Origin','updated','c7450ead-7746-4f32-a04f-7f4bd11df995','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"297250\"}, \"attributes\": {\"coordinates\": [[[508937.5935000002, 3134550.8051], [509597.5607999994, 3134551.014299999], [509597.38170000055, 3134100.5059], [508937.3891000005, 3134100.6045], [508937.5935000002, 3134550.8051]]], \"total_area_coords\": \"297897.44816427\"}}',NULL,'2025-05-29 12:50:15','2025-05-29 12:50:15'),
('e917d7c2-aac9-424d-a373-a258663fa343','default','City has been created','App\\Models\\City','created','e3495f87-db98-4903-9f07-500da72e26df',NULL,NULL,'{\"attributes\": {\"name\": \"قنا\", \"government_id\": \"50a70a99-9d38-4378-b559-5a0dbd67b161\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('e9a77fa3-218b-4fa4-9ae0-5258c245610e','default','City has been created','App\\Models\\City','created','1a7ed3e8-c2d7-42cf-8b8e-3355aa9c8cde',NULL,NULL,'{\"attributes\": {\"name\": \"مدينة بدر\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e9d635e6-1793-437f-b134-781b0ab08158','default','City has been created','App\\Models\\City','created','6fb9e717-e1df-49d2-895a-b060a7714b80',NULL,NULL,'{\"attributes\": {\"name\": \"سوهاج الجديدة\", \"government_id\": \"2ce9e59e-de6c-4bd9-9935-4b081e23c884\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('ea6a165e-1b50-47a2-a6b7-a5fd8c158708','default','OriginDetail has been created','App\\Models\\OriginDetail','created','c1763e75-05b9-4393-a986-5e62f437eb05','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 920, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 920, \"administrative_units\": null, \"number_of_buildings_executed\": 46}}',NULL,'2025-08-06 15:51:52','2025-08-06 15:51:52'),
('ead29e66-ca86-4158-804e-afb7bf9b7be5','default','Origin has been updated','App\\Models\\Origin','updated','9b372dd0-c0c6-497b-8c7b-3592ab39182a','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"14\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"24225\"}, \"attributes\": {\"city_id\": \"b8ddfa0d-91fd-461f-a7a6-28f96e95afb3\", \"used_area\": \"24225\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"14\"}}',NULL,'2025-05-04 12:55:43','2025-05-04 12:55:43'),
('eaf3104d-6ff8-4709-b921-8bac657326dd','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"old\": {\"notes\": \"جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية\"}, \"attributes\": {\"notes\": \"تمت موافقة مجلس الإدارة ومجلس الوزراء على استكمال تنفيذ عدد 46 عمارة \"}}',NULL,'2025-06-16 07:47:46','2025-06-16 07:47:46'),
('ec33b9d6-a2a8-46e2-bf1a-ca0f299ebd78','default','Origin has been updated','App\\Models\\Origin','updated','a19237b5-9d95-4e6d-ac97-80d6c372a4f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"223512.65\"}, \"attributes\": {\"coordinates\": [[[568894.8467999992, 3022107.1544999997], [568964.3892000001, 3022203.853199998], [569038.3426, 3022150.4186], [568970.7224999999, 3022054.038], [568894.8467999992, 3022107.1544999997]], [[568841.5976000003, 3022292.0938], [568941.4879000005, 3022220.0335], [568834.3096000003, 3022071.1235999996], [568738.8840999997, 3022134.8542000004], [568841.5976000003, 3022292.0938]], [[568741.2440000001, 3022101.9907999993], [568917.5522, 3021978.3543999996], [568761.8609000004, 3021755.634099999], [568561.2202000004, 3021905.446], [568741.2440000001, 3022101.9907999993]], [[568400.6815999999, 3021713.0121], [568546.7115000004, 3021895.0575], [568750.6801000005, 3021739.8791], [568622.8376000004, 3021574.2891], [568400.6815999999, 3021713.0121]], [[568383.7646000005, 3021690.763999998], [568606.4284999997, 3021534.7635999992], [568458.9268000001, 3021320.0931999995], [568226.7471, 3021456.9662999995], [568383.7646000005, 3021690.763999998]], [[568894.8467999992, 3022107.1544999997], [568964.3892000001, 3022203.853199998], [569038.3426, 3022150.4186], [568894.8467999992, 3022107.1544999997]]], \"total_area_coords\": \"231845.80196557\"}}',NULL,'2025-05-29 11:43:29','2025-05-29 11:43:29'),
('ec636787-d1f0-4496-80e4-0fd16e4436d1','default','City has been created','App\\Models\\City','created','7b816a32-bada-4488-b705-7d37c0bb94fe',NULL,NULL,'{\"attributes\": {\"name\": \"يوسف الصديق\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('ecc464da-176d-40ba-90a1-cebfe670d992','default','City has been created','App\\Models\\City','created','67122fca-c3e5-4dcb-84f2-cefc3fc0561f',NULL,NULL,'{\"attributes\": {\"name\": \"الواسطى\", \"government_id\": \"4775a4a6-101a-43b9-a5f5-4d0c60ded625\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('edfd0fb9-4ffb-484e-9dd4-8e4c8b7e2691','default','City has been created','App\\Models\\City','created','0d09b3c1-6cd3-4185-8728-ab88286c5961',NULL,NULL,'{\"attributes\": {\"name\": \"مصر الجديدة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('ee67f847-0f3f-445e-894a-1107fec71f35','default','City has been created','App\\Models\\City','created','746dd479-d1fb-48b8-a529-a211b077dfd7',NULL,NULL,'{\"attributes\": {\"name\": \"الدراسة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('ef9ffaf1-124f-4ea4-b13e-4ff0ab4884f8','default','City has been created','App\\Models\\City','created','53dae984-3494-4a9e-93a0-71c3d1409cc3',NULL,NULL,'{\"attributes\": {\"name\": \"أسيوط الجديدة\", \"government_id\": \"d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('efb626c5-f20d-42e1-87d4-2c38723487f5','default','City has been created','App\\Models\\City','created','f135bda3-a684-4f26-81d9-defa26178db9',NULL,NULL,'{\"attributes\": {\"name\": \"العجمي\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('efbb542d-143a-4c41-af7e-e6f7fe666c5f','default','City has been created','App\\Models\\City','created','fcb80c73-5f99-43f9-940e-917d2ae5b463',NULL,NULL,'{\"attributes\": {\"name\": \"شربين\", \"government_id\": \"63a6815e-8b5e-4d2b-9217-6764e8a14d19\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('efeace49-0c72-44f9-8dd5-aa2abed46beb','default','Origin has been created','App\\Models\\Origin','created','42eee216-bf60-4e81-9398-1607574cf902','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"سيف هيكل \", \"used_area\": \"50\", \"created_by\": null, \"project_id\": \"ca0a1f94-c970-4fbd-8514-c8f3e681a901\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"66\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2018, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"96000\", \"executing_entity_num\": \"96000\", \"total_area_allocated\": \"96000\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('eff3664f-a2e5-4f6e-8345-125cd0eceb70','default','Origin has been updated','App\\Models\\Origin','updated','12782081-8b6f-49c8-b0df-c0dd0b5b66bc','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"notes\": null}, \"attributes\": {\"notes\": \"مملوكة\"}}',NULL,'2025-05-06 09:50:20','2025-05-06 09:50:20'),
('f084a272-d764-4256-8357-1bd8a2079d35','default','User has been updated','App\\Models\\User','updated','1a21e4dd-be52-4b40-b2d6-e73c17f28824','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": \"6da764d9-bf25-44df-af15-130d21f9024d\"}, \"attributes\": {\"job_title_id\": \"c969eed4-c2f2-4b5e-a831-d4e6208c5f84\"}}',NULL,'2025-05-24 21:31:28','2025-05-24 21:31:28'),
('f0d7324b-0cc3-4879-b88a-f11f39b832f9','default','City has been created','App\\Models\\City','created','0d15eae0-e55b-46ea-99b6-57d706c2634f',NULL,NULL,'{\"attributes\": {\"name\": \"نخل\", \"government_id\": \"fd597d05-e8ca-4c88-a270-dedf07e8bade\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('f1212e11-a9b0-48b1-9e8e-dfe5953cfecc','default','OriginDetail has been created','App\\Models\\OriginDetail','created','83a42857-f2d7-475f-a955-04d6624585e2','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"75.00\", \"number_of_units\": 900, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 900, \"administrative_units\": null, \"number_of_buildings_executed\": 45}}',NULL,'2025-08-06 15:39:03','2025-08-06 15:39:03'),
('f1a0761b-72d5-4bb4-a4cf-b45991acbd7f','default','Origin has been created','App\\Models\\Origin','created','4fd4da64-3bdd-4e4d-9fa4-40ce85a5e5a9','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"تقسيم شمال الأحياء \", \"used_area\": \"126\", \"project_id\": \"b81c433c-94fd-421f-8a68-0cd152187eea\", \"decision_num\": \"503\", \"statement_id\": \"b95742fc-80c0-44d7-897c-88e52d11fc23\", \"decision_date\": 2021, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"210000\", \"executing_entity_num\": \"210000\", \"total_area_allocated\": \"210000\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('f1a3f69b-5416-4c64-95d9-865c208d36e2','default','Origin has been updated','App\\Models\\Origin','updated','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"location\": \"kjs,n\"}, \"attributes\": {\"location\": \"kjs,nhh\"}}',NULL,'2025-06-02 11:04:42','2025-06-02 11:04:42'),
('f20d3ff0-412d-46a4-bc06-1878fee409c8','default','Origin has been updated','App\\Models\\Origin','updated','0bf2f408-7733-47f9-8805-9847cc3408cd','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"created_by\": null, \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-05-04 12:43:46','2025-05-04 12:43:46'),
('f2af05b7-84e3-40a1-9fbc-60627f58554e','default','OriginDetail has been created','App\\Models\\OriginDetail','created','7a433960-fdb7-4dfe-b1a9-5794c4bf4a38','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"d37f766e-6d40-4626-b592-b3b53b0188bd\", \"unit_area\": \"90.00\", \"number_of_units\": 5100, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 5100, \"administrative_units\": null, \"number_of_buildings_executed\": 255}}',NULL,'2025-08-06 15:58:45','2025-08-06 15:58:45'),
('f2eb6dce-8033-4c3b-97df-b7edc6db79d5','default','Project has been created','App\\Models\\Project','created','ca0a1f94-c970-4fbd-8514-c8f3e681a901','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"name\": \"تنفيذ عدد 50 عمارة سيف هيكل – الغردقة\"}}',NULL,'2025-05-04 02:10:51','2025-05-04 02:10:51'),
('f35681c8-b245-4502-a712-e8f8051e247e','default','City has been created','App\\Models\\City','created','b9b9e465-dd16-4000-acf2-5d6222179efe',NULL,NULL,'{\"attributes\": {\"name\": \"دمياط الجديدة\", \"government_id\": \"32f67e21-6aa2-4bf8-ac48-a26310ba9906\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f3d1bc3c-e1eb-4e05-9635-68737154ad28','default','City has been created','App\\Models\\City','created','5c5f9b5c-7422-445b-92fe-b5675cfb6c8f',NULL,NULL,'{\"attributes\": {\"name\": \"حلوان\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('f3ecab02-ed27-493f-a556-453379649e4c','default','City has been created','App\\Models\\City','created','3a2c7dcf-0136-44c0-a8d9-595969ce8bdc',NULL,NULL,'{\"attributes\": {\"name\": \"الزينية\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('f3fc6ab4-81bd-4aa9-bdb3-8d34dacf7520','default','JobTitle has been created','App\\Models\\JobTitle','created','c969eed4-c2f2-4b5e-a831-d4e6208c5f84',NULL,NULL,'{\"attributes\": {\"name\": \"مدخل بيانات\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('f41057e0-58c0-4a73-8157-12773b0452ad','default','Origin has been updated','App\\Models\\Origin','updated','34f0e90c-c6e9-4f64-917b-0a7200cefee5','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"used_area\": \"126\", \"created_by\": null, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"executing_entity_num\": \"210000\"}, \"attributes\": {\"city_id\": \"648152e0-33d1-47bb-b7f0-54d1428e1ec1\", \"used_area\": \"210000\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\", \"executing_entity_num\": \"126\"}}',NULL,'2025-05-04 12:45:03','2025-05-04 12:45:03'),
('f48185b2-8c20-4fc4-bf96-5fd709194979','default','Origin has been created','App\\Models\\Origin','created','81a79a51-f841-4346-a10a-15468abd28e2','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"لم تنفذ العمارات حتى الآن \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"user_id\": \"8c82d771-63ae-4740-9ef8-b55a33b5821b\", \"location\": \"تقسيم الحجاز منطقة أبوعشرة الطريق الدائري \", \"used_area\": \"0\", \"project_id\": \"716e0bae-b7f4-4f7b-baa7-4d40c76d9ab0\", \"decision_num\": \"568\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2021, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"610977\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"1fc39eec-c714-4712-973a-fbc93733e7bc\", \"vacant_buildings\": \"500\", \"total_area_coords\": \"910977\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"610977\"}}',NULL,'2025-04-29 11:09:23','2025-04-29 11:09:23'),
('f4ab1d47-9abc-44ba-aa1d-2f0b3e814168','default','City has been created','App\\Models\\City','created','776efd16-c76e-4d71-a29b-c7dc7343bb2b',NULL,NULL,'{\"attributes\": {\"name\": \"رأس غارب\", \"government_id\": \"8397232a-163d-4a09-8e0c-9fa339e76497\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('f50f88e4-fd0d-4ca5-a03f-723c77164afb','default','City has been created','App\\Models\\City','created','ddadb06f-4d25-4d18-ba5c-8232b321aba7',NULL,NULL,'{\"attributes\": {\"name\": \"الفيوم الجديدة\", \"government_id\": \"c4dbc8e7-549e-4bce-ae29-91c736a8ff33\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('f54f9700-c8a9-4be7-8abf-7428b6493d1f','default','City has been created','App\\Models\\City','created','3842555d-bd2f-440c-869d-45d86e70b619',NULL,NULL,'{\"attributes\": {\"name\": \"فيصل\", \"government_id\": \"1a99feee-6a40-4988-a798-8c11978358df\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('f65a7cdd-36fa-4292-9701-bf6789da2f6f','default','City has been created','App\\Models\\City','created','cd53e824-14fe-416d-8381-e54765443536',NULL,NULL,'{\"attributes\": {\"name\": \"فوه\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f66d266f-42b8-4ccc-b99f-7a0273fe934a','default','Government has been created','App\\Models\\Government','created','2ce9e59e-de6c-4bd9-9935-4b081e23c884',NULL,NULL,'{\"attributes\": {\"name\": \"سوهاج\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('f6e2ff18-e1f3-4f2d-b254-d6a75b323362','default','City has been created','App\\Models\\City','created','03a36d6a-b63d-460b-81d1-8dc08b5b628f',NULL,NULL,'{\"attributes\": {\"name\": \"حى المناخ\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f75ef83a-b885-4d78-8653-ed676748c457','default','City has been created','App\\Models\\City','created','1d317ee4-97ee-41c6-bdbd-20ac1e4319f9',NULL,NULL,'{\"attributes\": {\"name\": \"الرحمانية\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('f7dbaa1f-f5cb-4f29-9a88-7e347c7b24fc','default','Origin has been created','App\\Models\\Origin','created','9b372dd0-c0c6-497b-8c7b-3592ab39182a','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم الاكتفاء بعدد 14 عمارة ويوجد مساحة شاغرة = 3524م2\", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"التقسيم الحضري \", \"used_area\": \"14\", \"created_by\": null, \"project_id\": \"83b33fa5-dce6-485f-b0ee-b3ad9f85ab12\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"65\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2018, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"3524\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"24225\", \"executing_entity_num\": \"24225\", \"total_area_allocated\": \"24225\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('f7dd7051-fd44-4daf-bfd6-b1fd5eacd314','default','Origin has been updated','App\\Models\\Origin','updated','8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19','{\"old\": {\"coordinates\": null, \"total_area_coords\": \"55500\"}, \"attributes\": {\"coordinates\": [[[592762.2324999995, 2961383.5776999984], [592912.2125000004, 2961391.0917], [592927.7906999994, 2961271.6111], [592754.2365, 2961261.478], [592762.2324999995, 2961383.5776999984]], [[592708.6639999998, 2961482.9013000014], [592893.7631999997, 2961489.0638999995], [592900.6089, 2961402.7088999995], [592754.1660000002, 2961392.831], [592752.1511000004, 2961366.8667999995], [592699.4280999998, 2961369.4369], [592708.6639999998, 2961482.9013000014]]], \"total_area_coords\": \"38180.348635757\"}}',NULL,'2025-05-29 12:57:10','2025-05-29 12:57:10'),
('f80b6391-cf6b-43a9-8762-41edda0c31eb','default','Origin has been created','App\\Models\\Origin','created','40e8dcfc-d87c-4958-aa4d-b17bb05110f3','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"سيف هيكل \", \"used_area\": \"50\", \"created_by\": null, \"project_id\": \"ca0a1f94-c970-4fbd-8514-c8f3e681a901\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"66\", \"statement_id\": \"5cc76d6c-a2ba-4209-81b6-063e0b5c52f0\", \"decision_date\": 2018, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"96000\", \"executing_entity_num\": \"96000\", \"total_area_allocated\": \"96000\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('f83827c3-7b94-4f9e-bd36-87d535461183','default','City has been created','App\\Models\\City','created','070b4783-63d7-40ce-b39d-554d12c7bb31',NULL,NULL,'{\"attributes\": {\"name\": \"بورسعيد\", \"government_id\": \"19a0685c-975d-4667-b3ae-015c1313e53b\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('f861dcc7-c2ca-4f78-be2a-da73bcfb4a3f','default','Origin has been created','App\\Models\\Origin','created','34f0e90c-c6e9-4f64-917b-0a7200cefee5','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": null, \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم شمال الأحياء \", \"used_area\": \"126\", \"created_by\": null, \"project_id\": \"98f4004a-0c62-4daf-a2e7-bc37bca85658\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"503\", \"statement_id\": \"b95742fc-80c0-44d7-897c-88e52d11fc23\", \"decision_date\": 2021, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"210000\", \"executing_entity_num\": \"210000\", \"total_area_allocated\": \"210000\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('f8814018-84fe-4a3b-bae9-54ea86e5fa15','default','City has been created','App\\Models\\City','created','ef1fdbb9-156a-41fc-b5ee-db41d5501bff',NULL,NULL,'{\"attributes\": {\"name\": \"منشأة القناطر\", \"government_id\": \"03487283-f8b8-4fed-bb38-397798eb3601\"}}',NULL,'2025-04-28 15:26:30','2025-04-28 15:26:30'),
('f89e4ab2-5831-45cc-9382-43f289aa42c3','default','City has been created','App\\Models\\City','created','3d615c5c-6037-4b95-b318-9ffccc5b8642',NULL,NULL,'{\"attributes\": {\"name\": \"سيدي سالم\", \"government_id\": \"2ff12ee0-3e7b-4cd6-84e0-894838774749\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f8bd7d2d-2b49-40a1-8ea9-19324cf5386b','default','Department has been created','App\\Models\\Department','created','cc52af45-46e9-409a-91f4-396a63bfecd4',NULL,NULL,'{\"attributes\": {\"name\": \"نظم المعلومات\"}}',NULL,'2025-04-28 15:26:28','2025-04-28 15:26:28'),
('f9095510-cee0-4c96-b355-2b8d1670f508','default','City has been created','App\\Models\\City','created','7d25f495-d9d3-4a09-8efd-78d5872c0162',NULL,NULL,'{\"attributes\": {\"name\": \"العاشر من رمضان\", \"government_id\": \"6b9fa5d5-e506-48b8-8538-71aed7f74808\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f90a7a36-8cb2-4450-9a40-54c88bd0deb9','default','Origin has been created','App\\Models\\Origin','created','8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"attributes\": {\"notes\": \"تم دمج الثلاث مناطق \", \"city_id\": \"2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f\", \"location\": \"تقسيم القمر \", \"used_area\": \"22\", \"created_by\": null, \"project_id\": \"721373d9-6c9f-407e-afe3-638f8b5e6dcc\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"142\", \"statement_id\": \"114e446a-71c7-4e79-a6d5-0ddf770b7a8d\", \"decision_date\": 2014, \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"good\", \"decision_type_id\": \"c1ec4c22-b5a7-4901-94e6-72665d74dbcf\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"55500\", \"executing_entity_num\": \"55500\", \"total_area_allocated\": \"55500\"}}',NULL,'2025-05-04 03:34:11','2025-05-04 03:34:11'),
('f914cc75-d8c4-4ab9-8934-3ae8f4d0aa0a','default','City has been created','App\\Models\\City','created','878f1e13-ff8d-4768-a2ea-f685c33e6c44',NULL,NULL,'{\"attributes\": {\"name\": \"القرنة\", \"government_id\": \"f183d7eb-93c2-4a9d-8a0b-80f97292f436\"}}',NULL,'2025-04-28 15:26:35','2025-04-28 15:26:35'),
('f9e066bd-83ab-4fc3-987b-8450e3fc9860','default','City has been created','App\\Models\\City','created','c8ddd2a2-70e0-4f87-8c73-b761224f265f',NULL,NULL,'{\"attributes\": {\"name\": \"أبو صوير\", \"government_id\": \"ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('fa22fc5d-4687-4bcb-98a7-2b14d8f32946','default','User has been updated','App\\Models\\User','updated','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"job_title_id\": \"6da764d9-bf25-44df-af15-130d21f9024d\", \"department_id\": \"72bd59f9-a04e-414d-b668-c83fc9ab2b57\"}}',NULL,'2025-04-29 11:02:50','2025-04-29 11:02:50'),
('fa61e32d-cf6c-402f-bc50-aee927417d6c','default','User has been updated','App\\Models\\User','updated','8c82d771-63ae-4740-9ef8-b55a33b5821b','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"email\": \"superadmin@gmail.com\", \"password\": \"$2y$10$EM/Frxf1uKFRjIiZ3H3A4us/zn8QrxiNym1RiF93jxMzC9HltiwJC\", \"job_title_id\": null, \"department_id\": null}, \"attributes\": {\"email\": \"mesmat@mff.gov.eg\", \"password\": \"$2y$10$yyzQrovOlFLkl0GdbcgHPuMwF.z5S4QF6u7dXf/WZIhoZ.DkJqfsy\", \"job_title_id\": \"5344a9c7-804b-490b-a650-fe3bc5fa7aab\", \"department_id\": \"cc52af45-46e9-409a-91f4-396a63bfecd4\"}}',NULL,'2025-06-02 10:57:15','2025-06-02 10:57:15'),
('faf4b3cc-720c-4941-b2fd-449036a0edd3','default','City has been created','App\\Models\\City','created','bfd8aac6-83ac-41dd-8b74-c90c588b842a',NULL,NULL,'{\"attributes\": {\"name\": \"الزاوية الحمراء\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('fb18350f-9052-4707-a382-179641bb64da','default','OriginDetail has been created','App\\Models\\OriginDetail','created','f7c33cda-a7c6-47b2-80e7-0d7b9366e381','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"a8b81ff9-507a-489e-9694-19abbc8bb84c\", \"unit_area\": \"120.00\", \"number_of_units\": 360, \"commercial_shops\": 40, \"commercial_units\": 10, \"residential_units\": 360, \"administrative_units\": null, \"number_of_buildings_executed\": 18}}',NULL,'2025-08-06 15:53:42','2025-08-06 15:53:42'),
('fb83c433-e7e0-4461-b2cd-2ce5019e6c22','default','City has been created','App\\Models\\City','created','0fd0b6f2-ea60-4f5d-9617-9e73e2b8158e',NULL,NULL,'{\"attributes\": {\"name\": \"الساحل الشمالي\", \"government_id\": \"054769fe-5fc5-4e1e-80b0-29540da931c0\"}}',NULL,'2025-04-28 15:26:31','2025-04-28 15:26:31'),
('fbf0b5e0-e7c7-403b-a14f-a164835ba02f','default','Origin has been updated','App\\Models\\Origin','updated','a8b81ff9-507a-489e-9694-19abbc8bb84c','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999956]], \"total_area_coords\": \"135995.60650312\"}, \"attributes\": {\"coordinates\": [[[579988.2689000006, 3011487.9699999997], [579757.7130000007, 3012349.5970000005], [579774.7020999992, 3012445.095], [579832.9656, 3012495.3189999997], [580078.0766000001, 3012574.749], [580221.5069000004, 3012080.434], [580730.3438, 3012261.427], [580759.8628999991, 3012121.305999999], [580364.9221999999, 3012028.5819999995], [580420.7804000003, 3011710.885], [580171.0343000008, 3011640.541], [580196.9350000003, 3011548.705], [579988.2689000006, 3011487.9699999997]], [[579403.5022000001, 3012039.003], [579544.0903000005, 3011562.6539999996], [579462.8074000003, 3011540.9019999993], [579284.8234999999, 3012144.71], [579688.6981999995, 3012431.3110000007], [579707.9531999999, 3012302.814], [579830.9615000001, 3011880.977], [579718.7779000003, 3011849.226999999], [579642.8422999998, 3012109.4449999994], [579403.5022000001, 3012039.003]]], \"total_area_coords\": \"629244.15172529\"}}',NULL,'2025-05-29 11:33:46','2025-05-29 11:33:46'),
('fc7401ca-a7d8-4bff-bbb7-f31fb16aeed0','default','OriginDetail has been created','App\\Models\\OriginDetail','created','9e74e974-10a7-4705-90f6-e0560dfef7b2','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"attributes\": {\"origin_id\": \"0fcbcbd8-1c21-4799-ad3a-e02975839dd6\", \"unit_area\": \"90.00\", \"number_of_units\": 304, \"commercial_shops\": null, \"commercial_units\": null, \"residential_units\": 304, \"administrative_units\": null, \"number_of_buildings_executed\": 19}}',NULL,'2025-08-06 16:16:47','2025-08-06 16:16:47'),
('fc9ae15c-e71f-47a9-9903-bcf5b81ff5d3','default','City has been created','App\\Models\\City','created','fd85c368-60c2-4d0f-b975-dedd86670110',NULL,NULL,'{\"attributes\": {\"name\": \"كوم حمادة\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('fd772210-5da6-4df2-8075-add8f5a3bc67','default','City has been created','App\\Models\\City','created','5c832af3-b3d9-491f-abe9-8697f44b9a91',NULL,NULL,'{\"attributes\": {\"name\": \"القاهرة الجديدة\", \"government_id\": \"3a0630ec-711b-4ed2-9846-d388c5457eb1\"}}',NULL,'2025-04-28 15:26:29','2025-04-28 15:26:29'),
('fdc67777-cae9-426d-9d2f-c43ed33d6a77','default','Origin has been created','App\\Models\\Origin','created','12782081-8b6f-49c8-b0df-c0dd0b5b66bc','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"attributes\": {\"notes\": null, \"city_id\": \"28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363\", \"location\": \"شالية رقم (621) الدور السادس فوق الأرضي\", \"used_area\": \"79\", \"created_by\": \"507e4996-9cd3-4732-8a24-a22b6035f03b\", \"project_id\": \"11c9bce4-bda1-4dc3-bfe3-df93fad563c7\", \"revised_by\": null, \"completed_by\": null, \"decision_num\": \"0\", \"statement_id\": \"d13e1541-82c3-4f97-b5ad-4acc423dd119\", \"decision_date\": 2020, \"government_id\": \"5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c\", \"origin_status\": \"inprogress\", \"available_area\": \"0\", \"decision_image\": null, \"remaining_area\": \"0\", \"location_status\": \"accept\", \"decision_type_id\": \"29887624-b6dd-4630-900f-a1f73d1e80c8\", \"vacant_buildings\": \"0\", \"total_area_coords\": \"79\", \"executing_entity_num\": \"0\", \"total_area_allocated\": \"79\"}}',NULL,'2025-05-06 09:45:27','2025-05-06 09:45:27'),
('fde984e0-703c-4dc4-a60d-9d3355951816','default','City has been created','App\\Models\\City','created','a18cdfc7-f233-4bb5-8c92-2f764d363acc',NULL,NULL,'{\"attributes\": {\"name\": \"أبو رديس\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34'),
('fe34b028-23cd-4c5a-8d75-ed5cac1a6d4a','default','JobTitle has been updated','App\\Models\\JobTitle','updated','c969eed4-c2f2-4b5e-a831-d4e6208c5f84','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"name\": \"مدخل بيانات 2\"}, \"attributes\": {\"name\": \"مدخل بيانات\"}}',NULL,'2025-04-28 15:36:32','2025-04-28 15:36:32'),
('fe4dc874-49cc-4389-9157-61c17009383c','default','User has been updated','App\\Models\\User','updated','b487eaf4-1582-4966-aace-bfa3a3a272d1','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"job_title_id\": \"c969eed4-c2f2-4b5e-a831-d4e6208c5f84\"}, \"attributes\": {\"job_title_id\": \"6da764d9-bf25-44df-af15-130d21f9024d\"}}',NULL,'2025-05-24 21:29:46','2025-05-24 21:29:46'),
('fee169d2-cdfe-49bf-b0c1-4b830b8206f9','default','City has been created','App\\Models\\City','created','6760f079-59f3-4436-a753-9ccad3f5b92a',NULL,NULL,'{\"attributes\": {\"name\": \"عتاقة\", \"government_id\": \"1a99feee-6a40-4988-a798-8c11978358df\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ff01fb72-57d2-4579-b68d-92eafeb8775b','default','City has been created','App\\Models\\City','created','959c6291-12f9-483d-bbad-72a09e5db432',NULL,NULL,'{\"attributes\": {\"name\": \"الفرافرة\", \"government_id\": \"9d091593-1817-4565-9fe2-123eb626fc1d\"}}',NULL,'2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ff160413-bd38-41fb-b031-192e72deacf4','default','City has been created','App\\Models\\City','created','82d468dd-6811-44ef-8056-cbfecd54ec6d',NULL,NULL,'{\"attributes\": {\"name\": \"المحمودية\", \"government_id\": \"31d94058-9f3a-4214-9f43-83976d66ade4\"}}',NULL,'2025-04-28 15:26:32','2025-04-28 15:26:32'),
('ff29176b-72ed-44ea-b639-06f406bfa201','default','Origin has been updated','App\\Models\\Origin','updated','f1adfec5-664d-4b68-8e46-7b05a438c5f4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"old\": {\"coordinates\": [[580297.2273, 3013561.441], [579915.7889, 3013215.575], [579819.6491, 3013357.231], [579845.1014, 3013424.1], [579842.981, 3013587.738], [580020.1236, 3013722.153], [580080.5048, 3013646.196], [580196.0028, 3013733.408]], \"total_area_coords\": \"135995.60650346\"}, \"attributes\": {\"coordinates\": [[580297.2273, 3013561.4410000006], [579915.7888999998, 3013215.575], [579819.6491000004, 3013357.230999999], [579845.1014000002, 3013424.0999999996], [579842.9809999992, 3013587.7380000004], [580020.1236000003, 3013722.153], [580080.5048000002, 3013646.196], [580196.0028000005, 3013733.4079999975]], \"total_area_coords\": \"135995.60650332\"}}',NULL,'2025-05-25 07:35:33','2025-05-25 07:35:33'),
('ffa248a0-3ac1-4e91-88ec-45f54f2b9f23','default','Origin has been updated','App\\Models\\Origin','updated','183885e1-7681-42cf-a63c-99fecd470fa3','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b','{\"old\": {\"decision_num\": \"867\", \"decision_image\": null}, \"attributes\": {\"decision_num\": \"876\", \"decision_image\": \"decision-images/1E3YHofIDjSzsf0AYbHoNkNvnXJoDCyq9dnwXFWe.pdf\"}}',NULL,'2025-05-04 13:28:17','2025-05-04 13:28:17'),
('ffd94a63-b809-44cd-ac17-505c6cc6ca6b','default','City has been created','App\\Models\\City','created','7813dbc3-3abf-412f-a1d7-28646ca448a6',NULL,NULL,'{\"attributes\": {\"name\": \"شرم الشيخ\", \"government_id\": \"d2987377-dfd6-4d83-8d73-a83dbe5f7530\"}}',NULL,'2025-04-28 15:26:34','2025-04-28 15:26:34');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `buildings` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_date` date DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `disputs_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_status` enum('owned','disputed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'owned',
  `location` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `government_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buildings_government_id_foreign` (`government_id`),
  KEY `buildings_city_id_foreign` (`city_id`),
  CONSTRAINT `buildings_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `buildings_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'eeea97c8-a1b0-4141-adb4-0873dfc8f713',
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '28b14836-8094-4308-b1e0-f7ef1942ea7a',
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `government_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_government_id_foreign` (`government_id`),
  CONSTRAINT `cities_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES
('002a2858-dbe2-49cc-8595-626fd7b6e768','3a0630ec-711b-4ed2-9846-d388c5457eb1','السلام','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('00413ad2-e740-415c-bc55-d7131828f11c','50a70a99-9d38-4378-b559-5a0dbd67b161','قفط','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('007c29e5-3d41-40ed-9ba3-23409bfde7bd','32f67e21-6aa2-4bf8-ac48-a26310ba9906','كفر البطيخ','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('0092c51c-9d6f-42ff-8ee3-5a0e492f91ac','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','الشيخ زايد','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('009d2293-1987-491c-9ad8-a5acfdc659df','31d94058-9f3a-4214-9f43-83976d66ade4','أبو حمص','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('00d3156a-49f0-476d-b126-6a20a8ac8bdc','d2987377-dfd6-4d83-8d73-a83dbe5f7530','أبو زنيمة','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('0189e713-5b50-43e3-b210-4659d6041c5a','894cb001-e9b0-43bf-8bcf-db953ebc4e98','قطور','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('01db473a-1112-4aac-afad-bc976c36162d','63a6815e-8b5e-4d2b-9217-6764e8a14d19','الكردي','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('02044373-26aa-41cd-9828-b9981242de45','eb94b50e-1cc5-45bc-bfed-39edd60acb33','القناطر الخيرية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('028c1878-7897-482e-b825-551b767a79d2','f183d7eb-93c2-4a9d-8a0b-80f97292f436','الأقصر','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('02a732c2-8f0e-49ff-a2be-b6cd0250f7fa','31d94058-9f3a-4214-9f43-83976d66ade4','حوش عيسى','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('02cb2778-9f03-4fa5-87c5-9ba26e843e0a','3a0630ec-711b-4ed2-9846-d388c5457eb1','الزمالك','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('02d0728f-32d5-4b1f-8c06-283ee9564c05','26b500a4-c361-4418-976f-31d769b44d24','كلابشة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('03795d48-6e37-417b-a120-eb39f14bd644','3a0630ec-711b-4ed2-9846-d388c5457eb1','التبين','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('039d9f6f-a971-4ca3-aa0e-a4388d911cbf','03487283-f8b8-4fed-bb38-397798eb3601','الكيت كات','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('03a36d6a-b63d-460b-81d1-8dc08b5b628f','19a0685c-975d-4667-b3ae-015c1313e53b','حى المناخ','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('04366409-7a20-451f-bdd4-3c4719f947e2','3995d987-3263-460b-b453-a62c21fd6050','دير مواس','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('070b4783-63d7-40ce-b39d-554d12c7bb31','19a0685c-975d-4667-b3ae-015c1313e53b','بورسعيد','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('079d6d62-84a4-47c5-aef5-8ee8ef712763','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','سرس الليان','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('07a0d396-c62f-464f-848c-7e47e55e1d88','6b9fa5d5-e506-48b8-8538-71aed7f74808','ديرب نجم','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('084be99c-2c02-4ef2-b165-40c91ae13ca6','03487283-f8b8-4fed-bb38-397798eb3601','المهندسين','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0a8af707-f037-4ee2-9f77-41735cac6e51','31d94058-9f3a-4214-9f43-83976d66ade4','وادي النطرون','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('0ab5ed1d-9a17-4e19-8456-520b1c7965b3','32f67e21-6aa2-4bf8-ac48-a26310ba9906','السرو','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('0ae0c985-07b8-4903-8ea3-119ae36d7a35','03487283-f8b8-4fed-bb38-397798eb3601','أوسيم','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0bec0ef3-771a-499e-b733-305bc9228743','31d94058-9f3a-4214-9f43-83976d66ade4','إيتاي البارود','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('0d09b3c1-6cd3-4185-8728-ab88286c5961','3a0630ec-711b-4ed2-9846-d388c5457eb1','مصر الجديدة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0d0ebab9-d350-47cf-8d44-e845025bc2cb','3a0630ec-711b-4ed2-9846-d388c5457eb1','مدينة نصر','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0d123232-9495-4baf-a733-27c92b104342','3a0630ec-711b-4ed2-9846-d388c5457eb1','الجمالية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('0d15eae0-e55b-46ea-99b6-57d706c2634f','fd597d05-e8ca-4c88-a270-dedf07e8bade','نخل','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('0ee1ef37-c18d-4473-ae28-dbc6f11d2b05','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','العلمين','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('0fd0b6f2-ea60-4f5d-9617-9e73e2b8158e','054769fe-5fc5-4e1e-80b0-29540da931c0','الساحل الشمالي','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('0fdfb3cc-5355-42aa-8e76-53ea3418aa3f','03487283-f8b8-4fed-bb38-397798eb3601','حدائق اكتوبر','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('105f9b1e-471c-4a85-accb-fddd6e14e070','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','السلوم','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('117882bf-f80d-471c-8329-d6e261ed4988','63a6815e-8b5e-4d2b-9217-6764e8a14d19','ميت غمر','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('12430d62-b6cd-402f-9931-c6cc605dae96','3a0630ec-711b-4ed2-9846-d388c5457eb1','مصر القديمة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('12743245-02ee-480f-a79c-bb2426b7da96','2ff12ee0-3e7b-4cd6-84e0-894838774749','كفر الشيخ','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('12841424-a69e-4672-b1df-8bc6b1780f04','26b500a4-c361-4418-976f-31d769b44d24','دراو','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('1373ac26-638d-403c-996e-27498de80232','32f67e21-6aa2-4bf8-ac48-a26310ba9906','الزرقا','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('142798b3-38fa-4b59-a165-d73981d97498','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','التل الكبير','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('14e79d3c-e643-4cf3-9588-f96a6dd935fa','9d091593-1817-4565-9fe2-123eb626fc1d','الداخلة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('164de6d6-9e04-41fe-b62e-a50dfa5217dc','3a0630ec-711b-4ed2-9846-d388c5457eb1','عزبة النخل','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('16569279-2cb6-415b-bbd6-77fa21f3b9d4','3a0630ec-711b-4ed2-9846-d388c5457eb1','باب الشعرية','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('1806ef87-a011-4249-8ead-340efb5fe9c2','054769fe-5fc5-4e1e-80b0-29540da931c0','المعمورة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('18d9cbfa-6dfc-4056-b7a7-9b0f5657fbd8','6b9fa5d5-e506-48b8-8538-71aed7f74808','ههيا','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('197c7fe8-3cd5-4099-8f74-1e69c0724b22','03487283-f8b8-4fed-bb38-397798eb3601','الشيخ زايد','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('1a303b2d-4d75-4545-8db3-69cd760d3a54','03487283-f8b8-4fed-bb38-397798eb3601','امبابة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('1a7ed3e8-c2d7-42cf-8b8e-3355aa9c8cde','3a0630ec-711b-4ed2-9846-d388c5457eb1','مدينة بدر','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('1aa4140a-9e42-47cb-b6d3-68202bfa4d5c','6b9fa5d5-e506-48b8-8538-71aed7f74808','القنايات','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1b398a37-706f-49e7-8850-c9d28f6d98ea','054769fe-5fc5-4e1e-80b0-29540da931c0','اللبان','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('1c22dfbb-8187-4c5d-b964-5bcae922cef3','fd597d05-e8ca-4c88-a270-dedf07e8bade','رفح','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('1c780b66-0121-4571-83df-9711415d87c3','63a6815e-8b5e-4d2b-9217-6764e8a14d19','ميت سلسيل','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('1d317ee4-97ee-41c6-bdbd-20ac1e4319f9','31d94058-9f3a-4214-9f43-83976d66ade4','الرحمانية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('1d8f69a4-231d-433a-aadd-62ddc6b2d929','63a6815e-8b5e-4d2b-9217-6764e8a14d19','بني عبيد','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('1daac9ab-be15-4c9e-b096-99c28e25e638','054769fe-5fc5-4e1e-80b0-29540da931c0','محرم بك','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('1e9a9f71-93e3-495b-8fb9-961510c7e94c','6b9fa5d5-e506-48b8-8538-71aed7f74808','أبو كبير','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1ed90df6-a885-450f-be3f-2bd7f9a8f5b4','6b9fa5d5-e506-48b8-8538-71aed7f74808','منشأة أبو عمر','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('1fbe3e7e-6dd8-4a93-8d85-4e11b99e1c9f','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','الضبعة','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('200ce370-99b2-48a2-a05d-c02b419e0373','3995d987-3263-460b-b453-a62c21fd6050','مغاغة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('2060be05-83a9-4f77-9699-3865a111b7dd','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','الحادقة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('20ae17fe-c664-4649-a6fd-df9a485a9922','63a6815e-8b5e-4d2b-9217-6764e8a14d19','تمي الأمديد','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('21172126-7355-4848-86d1-5b61a18cf7de','19a0685c-975d-4667-b3ae-015c1313e53b','حى الضواحى','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('218cb0cd-dd10-4423-a74c-de073874ba97','eb94b50e-1cc5-45bc-bfed-39edd60acb33','كفر شكر','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('22cff895-4481-440d-98d4-17a2e14d7a8d','054769fe-5fc5-4e1e-80b0-29540da931c0','سيدي كرير','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('22d5e3d8-0636-43aa-ae43-461295d80185','03487283-f8b8-4fed-bb38-397798eb3601','أبو رواش','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('22dbb0f8-b95d-443c-a008-62a74d8adf5f','3a0630ec-711b-4ed2-9846-d388c5457eb1','المطرية','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('22ee77c0-099a-4216-a44f-d43e552ff3cd','6b9fa5d5-e506-48b8-8538-71aed7f74808','الإبراهيمية','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('235d650f-1d35-4a49-a32b-b136a9871679','054769fe-5fc5-4e1e-80b0-29540da931c0','سيدي جابر','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('247a40b6-1835-4819-91fc-71f10f201d7a','fd597d05-e8ca-4c88-a270-dedf07e8bade','بئر العبد','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('254eb4b1-4d6c-49bd-bbe7-82d8c477c69c','8397232a-163d-4a09-8e0c-9fa339e76497','القصير','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('274dc7ac-e9c5-43ef-9830-71d7c6a943ab','26b500a4-c361-4418-976f-31d769b44d24','أسوان الجديدة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','الساحل الشمالى','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('2a4d8b0a-d39b-449a-98c9-c43dd2f72e7f','3a0630ec-711b-4ed2-9846-d388c5457eb1','المعادى','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('2a54516c-afed-421d-86a1-12bd9cd7506d','2ce9e59e-de6c-4bd9-9935-4b081e23c884','المنشأة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('2a733108-ee70-498e-aeaf-55fa91a1cd88','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','سيدي براني','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('2ae50471-64ce-491a-8432-a41de45140bc','3a0630ec-711b-4ed2-9846-d388c5457eb1','الزيتون','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('2b34b09e-9337-4fc2-b1a4-5572262382fa','3a0630ec-711b-4ed2-9846-d388c5457eb1','بولاق','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('2bcf7680-35f7-41cf-97b7-bec1b320e4ff','03487283-f8b8-4fed-bb38-397798eb3601','الواحات البحرية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('2c510335-cfdc-495a-badb-6f4d83f476cb','2ce9e59e-de6c-4bd9-9935-4b081e23c884','ساقلته','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('2df9cbd0-67fc-4292-aba5-a14e7672a48d','3a0630ec-711b-4ed2-9846-d388c5457eb1','عباسية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('2e6fc100-5e1c-4ec3-8977-8c10c1fddd55','894cb001-e9b0-43bf-8bcf-db953ebc4e98','المحلة الكبرى','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('2f7aaa6a-4c97-4c08-9ac5-210afcb6d05c','3a0630ec-711b-4ed2-9846-d388c5457eb1','الوايلى','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('2fcc1d63-64b2-4579-8cda-98060db83fef','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','مارينا','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('32cc3dd0-9f1e-452f-8f0a-74d922147cf9','32f67e21-6aa2-4bf8-ac48-a26310ba9906','فارسكور','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('32e39523-947e-4229-a963-ec1b880e7584','f183d7eb-93c2-4a9d-8a0b-80f97292f436','البياضية','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('34adc04c-d8e5-40fa-bb2b-88e3d974ed35','63a6815e-8b5e-4d2b-9217-6764e8a14d19','جمصة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('369b4caa-d5be-4ecb-9ca4-5cd353213758','894cb001-e9b0-43bf-8bcf-db953ebc4e98','بسيون','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('37c5658d-3def-4c1a-9b3c-9813486fcd2d','4775a4a6-101a-43b9-a5f5-4d0c60ded625','بني سويف','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('3842555d-bd2f-440c-869d-45d86e70b619','1a99feee-6a40-4988-a798-8c11978358df','فيصل','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('39efd5b0-a625-4bd2-97dd-5374f36925ca','3a0630ec-711b-4ed2-9846-d388c5457eb1','جاردن سيتى','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('3a2c7dcf-0136-44c0-a8d9-595969ce8bdc','f183d7eb-93c2-4a9d-8a0b-80f97292f436','الزينية','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('3d615c5c-6037-4b95-b318-9ffccc5b8642','2ff12ee0-3e7b-4cd6-84e0-894838774749','سيدي سالم','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('3dd6af34-ecb4-4ae0-a1fa-b6c40aed86c9','054769fe-5fc5-4e1e-80b0-29540da931c0','العامرية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('3e7d1f6a-ec24-4cee-94e6-79de6e715c18','3a0630ec-711b-4ed2-9846-d388c5457eb1','المعصرة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('3fecfdce-8226-4af3-a60f-48c9973605fd','2ce9e59e-de6c-4bd9-9935-4b081e23c884','جهينة الغربية','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('402a5030-33f6-45e5-9b2b-65e63b437421','6b9fa5d5-e506-48b8-8538-71aed7f74808','صان الحجر القبلية','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('40724ce4-ede7-4e52-aa21-7485f1cb9687','d2987377-dfd6-4d83-8d73-a83dbe5f7530','دهب','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('40d4ea26-662a-4d69-88b5-0a257f456574','eb94b50e-1cc5-45bc-bfed-39edd60acb33','بنها','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('41164875-fd9e-48f9-86b8-3ed071d7cc09','50a70a99-9d38-4378-b559-5a0dbd67b161','الوقف','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('412f8d8f-7171-4acf-acd7-b326b9208d55','054769fe-5fc5-4e1e-80b0-29540da931c0','سموحة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('4165167c-250a-49a6-a2ee-003e328f31f3','63a6815e-8b5e-4d2b-9217-6764e8a14d19','المطرية','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('42fb7d1e-1dc7-47c3-b6b8-975d09f19664','8397232a-163d-4a09-8e0c-9fa339e76497','سفاجا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('436a5f74-4e3d-4f0a-a540-21e1b7404dae','03487283-f8b8-4fed-bb38-397798eb3601','الوراق','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('43aa3f33-2d78-4b66-8a64-ee81dbf92e76','054769fe-5fc5-4e1e-80b0-29540da931c0','المفروزة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('43d5f2d9-0694-42df-97a2-483e49854ed3','50a70a99-9d38-4378-b559-5a0dbd67b161','نجع حمادي','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('4512d5ab-c334-4982-abe3-7c5aa4ea596e','63a6815e-8b5e-4d2b-9217-6764e8a14d19','المنزلة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('452baeeb-6df6-4753-a19c-2fe8cfb80c48','054769fe-5fc5-4e1e-80b0-29540da931c0','العصافرة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('452be793-6334-471e-8f8f-f1d95b31324d','3995d987-3263-460b-b453-a62c21fd6050','المنيا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('45590221-793d-40bf-aa47-f59aa9cf6a31','4775a4a6-101a-43b9-a5f5-4d0c60ded625','ناصر','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('45e75f67-dbfd-4ace-88f6-c4f51ea52fbd','054769fe-5fc5-4e1e-80b0-29540da931c0','بكوس','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('47aedab9-203a-4754-9b63-d4fdbfb3fd81','054769fe-5fc5-4e1e-80b0-29540da931c0','المكس','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('49a40067-552c-40bb-b443-4d061730a1d3','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','قويسنا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('49af6cb4-599a-4822-8584-6ed2254bec2e','50a70a99-9d38-4378-b559-5a0dbd67b161','قوص','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('49c7474b-8115-43ee-90ae-886a4ccae8a3','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','الحمام','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('4a9e74a4-fe04-401e-b0ee-a3d93cf48300','054769fe-5fc5-4e1e-80b0-29540da931c0','شدس','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('4db15570-6799-4b2c-9463-a03c5fa2ca96','054769fe-5fc5-4e1e-80b0-29540da931c0','برج العرب','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('4e4a077d-8288-458d-9705-2f729d8f0d68','3a0630ec-711b-4ed2-9846-d388c5457eb1','دار السلام','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('4f07eb23-9dbc-42c0-a938-0deeff431203','03487283-f8b8-4fed-bb38-397798eb3601','الصف','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('4f508f96-4abd-4bf0-811b-ba3b393d06e3','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','أسيوط','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('4f76361c-f454-4d88-b7ea-9547f657f0fa','3a0630ec-711b-4ed2-9846-d388c5457eb1','15 مايو','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('51c0d654-7d4f-4260-93b3-4411a6a4be7e','3a0630ec-711b-4ed2-9846-d388c5457eb1','النزهة الجديدة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('53dae984-3494-4a9e-93a0-71c3d1409cc3','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','أسيوط الجديدة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('53e38bf4-aed0-4e58-89e1-2087bf0143fa','63a6815e-8b5e-4d2b-9217-6764e8a14d19','السنبلاوين','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('541aaee5-a6f1-4e6d-b214-b0f9fe0e80f7','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','فايد','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('555f3287-b912-4c87-824e-188bbbc60c35','054769fe-5fc5-4e1e-80b0-29540da931c0','الابراهيمية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('557a5adb-cf57-48e8-9f71-32217a4544e3','26b500a4-c361-4418-976f-31d769b44d24','الرديسية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5634bf96-dfdc-4341-8e7e-fef9bf9a0b0a','3995d987-3263-460b-b453-a62c21fd6050','بني مزار','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('57ab6f25-135a-4bbf-b698-29897ba51c28','9d091593-1817-4565-9fe2-123eb626fc1d','موط','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('57b7243a-b077-4916-9e3c-26f8ff15947c','26b500a4-c361-4418-976f-31d769b44d24','السباعية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('583fdf06-b9b8-4c97-8f50-d6e1cf1860f8','eb94b50e-1cc5-45bc-bfed-39edd60acb33','شبرا الخيمة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('58493cf5-770d-4d67-9b76-eccf339cd060','31d94058-9f3a-4214-9f43-83976d66ade4','النوبارية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('5965b7d5-966c-4118-8bd5-ae73f0c3befe','eb94b50e-1cc5-45bc-bfed-39edd60acb33','العبور','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5a188693-977c-4afa-b795-0d17dc7133ba','eb94b50e-1cc5-45bc-bfed-39edd60acb33','الخانكة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5bfafbb6-d8ae-4e4f-9dc1-3605ad197947','6b9fa5d5-e506-48b8-8538-71aed7f74808','كفر صقر','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('5c5f9b5c-7422-445b-92fe-b5675cfb6c8f','3a0630ec-711b-4ed2-9846-d388c5457eb1','حلوان','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('5c832af3-b3d9-491f-abe9-8697f44b9a91','3a0630ec-711b-4ed2-9846-d388c5457eb1','القاهرة الجديدة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('5c95a5bf-c8ea-47a1-a981-1545edfa4943','26b500a4-c361-4418-976f-31d769b44d24','أسوان','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5d1032a0-d825-4788-8b54-ff16b3b727e9','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','الغنايم','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5e2402f1-c3f2-4d52-a5f2-7dcf4b8e7c05','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','ساحل سليم','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('5e84e7cf-9dd9-457e-bbce-6b91fe36a0ea','03487283-f8b8-4fed-bb38-397798eb3601','أطفيح','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('5f236532-7afc-4fe3-a04c-656b87d56bf9','2ce9e59e-de6c-4bd9-9935-4b081e23c884','البلينا','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('602238e5-7fd6-48f9-ad32-8456489c7136','eb94b50e-1cc5-45bc-bfed-39edd60acb33','مسطرد','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('60557166-a7cd-4d31-b0b2-1064ba6119b5','2ff12ee0-3e7b-4cd6-84e0-894838774749','قلين','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('6064244c-97b4-4d6a-9acf-07193c94a8ef','3995d987-3263-460b-b453-a62c21fd6050','العدوة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('6082f813-8eb4-48dd-9ac6-433f06904979','2ce9e59e-de6c-4bd9-9935-4b081e23c884','جرجا','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('61428bd7-c634-4b62-8a02-ae7ccde41c1f','054769fe-5fc5-4e1e-80b0-29540da931c0','السيوف','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('61ca0381-b3c8-4016-86b1-6929c7c39da2','3a0630ec-711b-4ed2-9846-d388c5457eb1','المنيل','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('643479bb-7585-41ce-9867-dbcfba6f5232','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','إبشواي','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('644f083f-cd82-4794-8a46-36949725ef3c','3a0630ec-711b-4ed2-9846-d388c5457eb1','الرحاب','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('64646179-74c5-42f7-bf35-11303eb4674a','31d94058-9f3a-4214-9f43-83976d66ade4','كفر الدوار','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('648152e0-33d1-47bb-b7f0-54d1428e1ec1','8397232a-163d-4a09-8e0c-9fa339e76497','الغردقة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('64c400da-8920-4716-85dc-9cadae26ea1b','3995d987-3263-460b-b453-a62c21fd6050','مطاي','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('65636221-ba9a-4273-91dd-ba5274be0f0e','eb94b50e-1cc5-45bc-bfed-39edd60acb33','الخصوص','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('65aa9b46-45d8-4a14-b155-4dd0d453940b','3a0630ec-711b-4ed2-9846-d388c5457eb1','العاصمة الإدارية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('65ee46e6-a870-4ee4-8f27-ba221e43ecee','2ce9e59e-de6c-4bd9-9935-4b081e23c884','طهطا','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('665f8183-9981-4719-9aee-05961d4d474f','6b9fa5d5-e506-48b8-8538-71aed7f74808','القرين','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('670b58f5-9aee-45d6-a167-b825eebd1100','63a6815e-8b5e-4d2b-9217-6764e8a14d19','بلقاس','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('67122fca-c3e5-4dcb-84f2-cefc3fc0561f','4775a4a6-101a-43b9-a5f5-4d0c60ded625','الواسطى','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('6760f079-59f3-4436-a753-9ccad3f5b92a','1a99feee-6a40-4988-a798-8c11978358df','عتاقة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('676ee238-3a99-4080-bc40-5fc74f4b2659','054769fe-5fc5-4e1e-80b0-29540da931c0','فلمينج','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('67a33fc8-b1b1-4ef3-90f0-d87dad1663e8','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','الفيوم','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('68a56a49-a376-4302-ae49-809ae670f153','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','نفيشة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('68ac49c1-6ddf-4b4b-851e-553773d05f62','26b500a4-c361-4418-976f-31d769b44d24','البصيلية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('695ca204-354d-4f80-b3e5-9983bb0d8cb5','31d94058-9f3a-4214-9f43-83976d66ade4','الدلنجات','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('6a0a5bf6-7e84-4631-abd6-9e2e1fcd1813','2ff12ee0-3e7b-4cd6-84e0-894838774749','وسط البلد كفر الشيخ','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('6a46108d-cf50-4678-89b9-52eeea5358a4','03487283-f8b8-4fed-bb38-397798eb3601','الهرم','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('6aebfbe1-46db-4dc5-a4ae-e7ac74bbedf8','2ce9e59e-de6c-4bd9-9935-4b081e23c884','المراغة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('6cae1c30-e2dd-49da-8429-ae8d7eda6c0f','2ce9e59e-de6c-4bd9-9935-4b081e23c884','طما','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('6cee1abd-d1d7-4265-a612-ecf54e5d9048','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','الشهداء','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('6d444935-22b5-4d1a-8965-3879c7ec4850','d2987377-dfd6-4d83-8d73-a83dbe5f7530','طابا','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('6e233bfc-cf0d-4146-b3dc-bf1a16c93bd5','2ff12ee0-3e7b-4cd6-84e0-894838774749','مطوبس','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('6eef40e7-5dc7-44dc-a631-374f60efa027','d2987377-dfd6-4d83-8d73-a83dbe5f7530','رأس سدر','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('6f99724d-fe27-4e42-a253-d287dd81af52','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','طامية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('6fb9e717-e1df-49d2-895a-b060a7714b80','2ce9e59e-de6c-4bd9-9935-4b081e23c884','سوهاج الجديدة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('705ace4b-99ab-42ad-b422-ea25d2ac736c','3a0630ec-711b-4ed2-9846-d388c5457eb1','البساتين','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('722498ec-4d5a-486f-a006-e3f64d59ff7f','3995d987-3263-460b-b453-a62c21fd6050','ابو قرقاص','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('724c0d39-c7cc-45e4-8d6f-fa959de76e15','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','السيالة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('725c821a-bb0d-4abd-a75f-a160375aa8f7','03487283-f8b8-4fed-bb38-397798eb3601','ارض اللواء','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('734ac380-768f-4a1f-9e45-f0027f5f2737','3a0630ec-711b-4ed2-9846-d388c5457eb1','الشرابية','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('73c1df29-3483-42b2-9549-891dd1e198c8','32f67e21-6aa2-4bf8-ac48-a26310ba9906','الروضة','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('73f2378f-4563-468c-8580-c98bc4e97a6a','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','إطسا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('746dd479-d1fb-48b8-a529-a211b077dfd7','3a0630ec-711b-4ed2-9846-d388c5457eb1','الدراسة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('748e1988-3020-4c13-b0e9-a9186e52e251','054769fe-5fc5-4e1e-80b0-29540da931c0','بولكلي','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('749d2090-081f-4b8c-bd59-9483bf9f0311','2ce9e59e-de6c-4bd9-9935-4b081e23c884','أخميم','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('74d12ef1-69c2-4510-85d0-83ed5dc574d8','3a0630ec-711b-4ed2-9846-d388c5457eb1','مدينة العبور','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('7537b612-0952-4c82-a50d-3dacd8223418','4775a4a6-101a-43b9-a5f5-4d0c60ded625','مقبل','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('75b84153-e0ff-4aa8-af2e-63485965df4b','3a0630ec-711b-4ed2-9846-d388c5457eb1','النزهة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('76dfee99-a66d-41a9-9bd1-fd5ab6304560','054769fe-5fc5-4e1e-80b0-29540da931c0','كرموز','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('776efd16-c76e-4d71-a29b-c7dc7343bb2b','8397232a-163d-4a09-8e0c-9fa339e76497','رأس غارب','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7813dbc3-3abf-412f-a1d7-28646ca448a6','d2987377-dfd6-4d83-8d73-a83dbe5f7530','شرم الشيخ','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('78a0bec3-3da6-4758-851f-1e87acb6e131','8397232a-163d-4a09-8e0c-9fa339e76497','الدهار','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7a2dc8ed-6583-4816-a419-b1d85b0ac2dc','f183d7eb-93c2-4a9d-8a0b-80f97292f436','الطود','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('7a5905bd-393d-43d7-96d5-a64418bb215f','3a0630ec-711b-4ed2-9846-d388c5457eb1','حدائق القبة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('7a864fdd-218f-4682-a201-dfd0c5d7fff8','32f67e21-6aa2-4bf8-ac48-a26310ba9906','دمياط','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('7b3bf15f-89e4-4d24-951a-e656546a1349','1a99feee-6a40-4988-a798-8c11978358df','الجناين','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7b816a32-bada-4488-b705-7d37c0bb94fe','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','يوسف الصديق','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7bc4dbd0-ce87-4502-9467-f4b6386f07ff','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','سيوة','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('7be215ba-4617-411f-a96a-b95fca7c4905','3a0630ec-711b-4ed2-9846-d388c5457eb1','عين شمس','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('7c360213-8a2b-4f61-b5ae-511800c34ca2','f183d7eb-93c2-4a9d-8a0b-80f97292f436','إسنا','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('7d139f53-4657-4912-bb6e-b8826c699047','9d091593-1817-4565-9fe2-123eb626fc1d','باريس','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7d25f495-d9d3-4a09-8efd-78d5872c0162','6b9fa5d5-e506-48b8-8538-71aed7f74808','العاشر من رمضان','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('7dc163a5-0b8b-4429-87d0-11ffb4fb8970','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','الإسماعيلية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('7e2e0d23-c849-4b3f-8d5e-f9078cc4b56f','19a0685c-975d-4667-b3ae-015c1313e53b','بورفؤاد','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('7f520150-48a5-4ff4-a3c3-0a1afe2d585c','d2987377-dfd6-4d83-8d73-a83dbe5f7530','سانت كاترين','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('7f92e367-1e50-44c6-85de-c9e6c359d307','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','القنطرة غرب','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('800dcf20-2ad5-46e5-ba77-c7c581221714','63a6815e-8b5e-4d2b-9217-6764e8a14d19','الجمالية','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('80fab2b1-112a-43f0-b47e-55c282c39a9b','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','منفلوط','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('81b7b5f0-a007-4fdd-b6ee-93fd1d766679','63a6815e-8b5e-4d2b-9217-6764e8a14d19','دكرنس','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('821c6cb6-2fe2-4ae8-a7ae-f03d2091ff5a','2ff12ee0-3e7b-4cd6-84e0-894838774749','بيلا','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('823f61c9-ea66-46e6-952b-dd280d24cce0','31d94058-9f3a-4214-9f43-83976d66ade4','أبو المطامير','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('82ad610e-a2f0-46eb-a2a9-b43847b60995','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','الجامعة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('82d468dd-6811-44ef-8056-cbfecd54ec6d','31d94058-9f3a-4214-9f43-83976d66ade4','المحمودية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('838c1042-02aa-4f1a-b6fb-fb824b02d5a9','3a0630ec-711b-4ed2-9846-d388c5457eb1','عابدين','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('8674a590-447b-4ff6-9c22-89ed0cd20606','054769fe-5fc5-4e1e-80b0-29540da931c0','غيط العنب','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('86d5ee71-03bb-4637-a1c6-6155a38883c7','26b500a4-c361-4418-976f-31d769b44d24','كوم أمبو','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('873aad75-8773-4091-950f-7a8c0b1165f6','8397232a-163d-4a09-8e0c-9fa339e76497','الشلاتين','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('87438c7a-7760-435c-9b4b-8163c32f4d7e','2ff12ee0-3e7b-4cd6-84e0-894838774749','مصيف بلطيم','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('878f1e13-ff8d-4768-a2ea-f685c33e6c44','f183d7eb-93c2-4a9d-8a0b-80f97292f436','القرنة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('87e1b0e0-3bb6-4dd4-92d8-7a480b09e99e','32f67e21-6aa2-4bf8-ac48-a26310ba9906','رأس البر','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('887770c4-7e44-4723-ac2a-42cafd5b106b','3a0630ec-711b-4ed2-9846-d388c5457eb1','الازبكية','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('8a3f6260-d541-454c-9d38-82dab5dea7d7','3995d987-3263-460b-b453-a62c21fd6050','المدينة الفكرية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('8ab6df07-d0fa-41fe-a8c2-5ed67ea86224','31d94058-9f3a-4214-9f43-83976d66ade4','رشيد','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('8b635c0c-7a43-4b79-94ab-7dacd39b8fdc','054769fe-5fc5-4e1e-80b0-29540da931c0','المندرة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('8cbf05bf-f92a-4d92-86f5-eafcd6884f60','054769fe-5fc5-4e1e-80b0-29540da931c0','الانفوشى','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('8cea773e-deb0-473c-b719-b6decf8be9d3','d2987377-dfd6-4d83-8d73-a83dbe5f7530','الطور','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('8e15f276-f6c5-4cfc-a4f5-87a7d4d7a912','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','القوصية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('8fd1aa5d-a4e6-4def-91dc-75bc668c6a10','03487283-f8b8-4fed-bb38-397798eb3601','الجيزة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('912938ba-214c-468d-a77d-47aa3f8c30ce','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','سنورس','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('91782eba-27f5-4505-92b4-7b67e633e0ef','19a0685c-975d-4667-b3ae-015c1313e53b','حى الشرق','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('91b42e25-9c62-4011-9a85-4693fb904b19','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','أشمون','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('923ce550-01f2-4cfd-9be8-fb8f408aaf5a','4775a4a6-101a-43b9-a5f5-4d0c60ded625','إهناسيا','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('937c65bb-7cb5-4940-8a31-7544852a54c8','054769fe-5fc5-4e1e-80b0-29540da931c0','فيكتوريا','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('942439be-5d0e-429d-8b85-486c0d64b913','054769fe-5fc5-4e1e-80b0-29540da931c0','العطارين','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('959c6291-12f9-483d-bbad-72a09e5db432','9d091593-1817-4565-9fe2-123eb626fc1d','الفرافرة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('963283e6-24ba-4614-9dca-b28d51661ac0','4775a4a6-101a-43b9-a5f5-4d0c60ded625','الاباصيرى','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('98354d31-5024-478d-8a7c-697e0049e185','32f67e21-6aa2-4bf8-ac48-a26310ba9906','كفر سعد','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('989e3116-6c5a-4c03-94db-8324af1b5590','3a0630ec-711b-4ed2-9846-d388c5457eb1','القطامية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('9a9c0f12-f9bf-46cf-bf0a-3e4dddadcd75','f183d7eb-93c2-4a9d-8a0b-80f97292f436','الأقصر الجديدة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('9bec9209-59b4-47fd-9b88-9cda58b49e00','3a0630ec-711b-4ed2-9846-d388c5457eb1','مدينة الشروق','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('9bfdc4e9-d168-4b82-906d-70c97fb26410','2ff12ee0-3e7b-4cd6-84e0-894838774749','برج البرلس','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('9c35a527-974c-48b4-b9ee-83b37428106b','9d091593-1817-4565-9fe2-123eb626fc1d','بلاط','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('9c54b10d-4509-428f-91aa-68523270ec7f','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','أبو تيج','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('9e6c4764-7392-4149-8ff2-c992f412b78b','50a70a99-9d38-4378-b559-5a0dbd67b161','دشنا','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('9eb1b79c-6893-4210-b0b6-a40e9501b1b5','2ff12ee0-3e7b-4cd6-84e0-894838774749','بلطيم','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('9ef4679b-a291-42ab-9c08-d51d45761b4b','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','منوف','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('9faf46cb-0d83-4f64-8f09-ad64f7230d50','3a0630ec-711b-4ed2-9846-d388c5457eb1','مدينتي','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('a110b77e-0701-4975-99f1-58a526287b17','03487283-f8b8-4fed-bb38-397798eb3601','بين السرايات','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('a15d1d77-7bd5-49d7-96d5-ea27df996bdb','3a0630ec-711b-4ed2-9846-d388c5457eb1','شيراتون','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('a1794741-b825-4194-83a4-73183cd8d18e','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','تلا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a18cdfc7-f233-4bb5-8c92-2f764d363acc','d2987377-dfd6-4d83-8d73-a83dbe5f7530','أبو رديس','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('a3185a47-cdd5-435d-ae6f-4fd29733cf87','3a0630ec-711b-4ed2-9846-d388c5457eb1','الموسكى','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('a32f5da2-ee62-4d63-99c6-3bf7b401e3a6','054769fe-5fc5-4e1e-80b0-29540da931c0','الناصرية','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('a34f5118-1757-4a7f-b3bb-6fd138bd3a81','2ce9e59e-de6c-4bd9-9935-4b081e23c884','دار السلام','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('a43d9370-41bd-4b42-abc3-f920438a6793','3a0630ec-711b-4ed2-9846-d388c5457eb1','المرج','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('a564eee3-2f07-4edc-87a2-14482e59ab9a','31d94058-9f3a-4214-9f43-83976d66ade4','دمنهور','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a7a4d3ba-3bc2-4b4b-a25c-c50b73141657','894cb001-e9b0-43bf-8bcf-db953ebc4e98','طنطا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a7c288ad-8aca-44a0-9b3a-89858eadcc13','3995d987-3263-460b-b453-a62c21fd6050','ارض سلطان','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('a8300a0d-34a8-4474-aaeb-306ae9f9b6ce','3995d987-3263-460b-b453-a62c21fd6050','المنيا الجديدة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('a9a91a5e-05e5-47f8-885c-dbb12b575ba0','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','صدفا','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ab945899-9a5f-4969-bc58-599c4d77114c','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','بركة السبع','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('ac51da1b-6d5e-4c41-9c39-9ceafce8ddb2','31d94058-9f3a-4214-9f43-83976d66ade4','النوبارية الجديدة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('ac722c94-8d08-4c12-a2c5-e6c3e3ed8c19','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','البداري','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ad66754a-fc56-45b9-bab7-a487f90b0c9e','f183d7eb-93c2-4a9d-8a0b-80f97292f436','أرمنت','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('ad7cf88b-987a-40c3-ba79-c5e22e07f28f','3a0630ec-711b-4ed2-9846-d388c5457eb1','الدرب الاحمر','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('ae8d2003-5989-4636-8404-685a1574a269','63a6815e-8b5e-4d2b-9217-6764e8a14d19','منية النصر','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('b1d560c6-87be-4abc-a387-455c19d22341','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','مدينة السادات','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('b1d6bf5e-023b-4920-ba1a-0d84a1079959','6b9fa5d5-e506-48b8-8538-71aed7f74808','الحسينية','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('b22c19ca-4404-498c-8e50-e5e3eee4a8e3','6b9fa5d5-e506-48b8-8538-71aed7f74808','فاقوس','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('b291c7fd-4431-4dbd-b457-2b0989fff2f1','03487283-f8b8-4fed-bb38-397798eb3601','صفط اللبن','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('b2a50518-7f9e-4d99-a424-598d372dc491','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','اطسا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('b2ff0038-11d6-4462-b6c3-957fd55115da','03487283-f8b8-4fed-bb38-397798eb3601','الباويطي','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('b3b8ef4d-8d9a-407a-b5d4-0603e62f6bd1','6b9fa5d5-e506-48b8-8538-71aed7f74808','الصالحية الجديدة','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('b455da4f-c883-4c3a-8717-103818b34a54','054769fe-5fc5-4e1e-80b0-29540da931c0','الحضرة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('b6802da6-978d-4147-b26f-b414e46cd8e4','03487283-f8b8-4fed-bb38-397798eb3601','العياط','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('b6a12a01-c2be-4a8c-8df8-c207dd2483b4','19a0685c-975d-4667-b3ae-015c1313e53b','حى مبارك','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('b8b1dc59-c155-4b10-ac5f-661dc4759090','3a0630ec-711b-4ed2-9846-d388c5457eb1','وسط البلد','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('b8d90cb4-3ef8-437f-b9b6-dca5fddee3c0','6b9fa5d5-e506-48b8-8538-71aed7f74808','مشتول السوق','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('b8ddfa0d-91fd-461f-a7a6-28f96e95afb3','8397232a-163d-4a09-8e0c-9fa339e76497','مرسى علم','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('b8e6a299-c016-4acb-92f9-3a992c79242e','26b500a4-c361-4418-976f-31d769b44d24','إدفو','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('b9b9e465-dd16-4000-acf2-5d6222179efe','32f67e21-6aa2-4bf8-ac48-a26310ba9906','دمياط الجديدة','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('bacbfff9-6722-4e24-9956-abca8707df85','eb94b50e-1cc5-45bc-bfed-39edd60acb33','طوخ','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('bb11f973-2fb8-4e7e-8acf-636f073d5b07','03487283-f8b8-4fed-bb38-397798eb3601','حدائق الأهرام','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('bc3cb58f-d79c-4c89-9d29-4dea8ed8a4af','2ce9e59e-de6c-4bd9-9935-4b081e23c884','الكوثر','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('bc79f2be-5597-4424-8f02-e288a477c24e','8397232a-163d-4a09-8e0c-9fa339e76497','حلايب','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('bc88629a-d83d-411d-aac7-28c778e156b0','3a0630ec-711b-4ed2-9846-d388c5457eb1','منشية ناصر','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('bce4818c-eddb-442a-b630-96e0d552a3e4','03487283-f8b8-4fed-bb38-397798eb3601','العجوزة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('bdd61697-667c-4d61-ad0d-7598221dc607','f183d7eb-93c2-4a9d-8a0b-80f97292f436','طيبة الجديدة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('bebda26b-25b8-4d48-bfba-6f6361111e0f','2ff12ee0-3e7b-4cd6-84e0-894838774749','الرياض','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('bfa38bed-8367-41b5-8dc2-94c468896cc8','50a70a99-9d38-4378-b559-5a0dbd67b161','ابو طشت','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('bfd8aac6-83ac-41dd-8b74-c90c588b842a','3a0630ec-711b-4ed2-9846-d388c5457eb1','الزاوية الحمراء','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('c0709c6c-c5d5-4996-bb04-6137ab6ca224','3a0630ec-711b-4ed2-9846-d388c5457eb1','شبرا','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('c1bd9c97-ec0a-4ce0-a08d-294ca5f6fea6','03487283-f8b8-4fed-bb38-397798eb3601','العمرانية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c215889d-bd2f-46a1-9acc-f728ba1c5c86','2ff12ee0-3e7b-4cd6-84e0-894838774749','سيدي غازي','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('c3fb8f0a-9d8b-45c9-8ab8-aad0ea928bda','894cb001-e9b0-43bf-8bcf-db953ebc4e98','السنطة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('c4ce47ad-f470-4be6-a097-b995de8346bf','2ff12ee0-3e7b-4cd6-84e0-894838774749','دسوق','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('c58138ce-28dc-4be7-a427-9eb91123acfe','03487283-f8b8-4fed-bb38-397798eb3601','المنيب','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c5ce8d27-aa52-4553-a7cf-97dd879775a5','054769fe-5fc5-4e1e-80b0-29540da931c0','كليوباترا','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('c65b5218-7754-4d87-9aae-f5663d17e8a2','3a0630ec-711b-4ed2-9846-d388c5457eb1','روض الفرج','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('c6a1b890-f1c8-431c-a3b9-94768e9396d7','054769fe-5fc5-4e1e-80b0-29540da931c0','سيدى بشر','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('c898a0d6-eafc-446d-ab60-0c421b6db0ec','fd597d05-e8ca-4c88-a270-dedf07e8bade','الشيخ زويد','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('c8c583e1-56ee-4020-9cb5-48b4c924e6c0','2ce9e59e-de6c-4bd9-9935-4b081e23c884','أخميم الجديدة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('c8ddd2a2-70e0-4f87-8c73-b761224f265f','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','أبو صوير','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('ca5391d8-9bbf-45eb-b8fa-6920f8ceecaf','054769fe-5fc5-4e1e-80b0-29540da931c0','الشاطبي','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('cb9c3cd0-4fa7-4bd5-a42f-66b24e8ec41d','03487283-f8b8-4fed-bb38-397798eb3601','فيصل','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('cc77ee3c-9b93-463f-a8cf-e1a86077ce01','3a0630ec-711b-4ed2-9846-d388c5457eb1','الساحل','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('cc839f2c-6888-484e-a5ff-12ef504740f5','03487283-f8b8-4fed-bb38-397798eb3601','كفر غطاطي','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('cccabb0b-4a38-41fa-a738-467bb2e45d75','894cb001-e9b0-43bf-8bcf-db953ebc4e98','سمنود','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('cce9789d-7aa3-46f3-8e72-f46bd4d81b25','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','أبنوب','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('cd1905e8-e4d1-49cc-9e55-a6eab1d33318','054769fe-5fc5-4e1e-80b0-29540da931c0','محطة الرمل','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('cd53e824-14fe-416d-8381-e54765443536','2ff12ee0-3e7b-4cd6-84e0-894838774749','فوه','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('ce6bb927-7a10-44bd-b472-5e61c0d04e95','9d091593-1817-4565-9fe2-123eb626fc1d','الخارجة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ce7f4e2d-2e62-4bef-b927-e9a5c01a93b3','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','النجيلة','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('cf2a1765-4698-4ec0-82bd-68c420b8569d','fd597d05-e8ca-4c88-a270-dedf07e8bade','العريش','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('d036869f-457f-4f09-ba89-689245e1e431','894cb001-e9b0-43bf-8bcf-db953ebc4e98','زفتى','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('d093fe9b-c428-4279-9f3e-1f7685135093','054769fe-5fc5-4e1e-80b0-29540da931c0','الأزاريطة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('d13b061d-4139-4d53-8c88-9ca25a03719f','054769fe-5fc5-4e1e-80b0-29540da931c0','امبروزو','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d141db53-8921-4ebb-b564-8e4ee12929d9','6b9fa5d5-e506-48b8-8538-71aed7f74808','بلبيس','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('d1a2e0e2-bdf6-45f9-af74-fe955ef50381','63a6815e-8b5e-4d2b-9217-6764e8a14d19','طلخا','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d23f791c-97ff-4a11-9f8a-5a458a552acb','054769fe-5fc5-4e1e-80b0-29540da931c0','المنتزه','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d270930d-5218-4efe-8a9e-e04ebad6d08b','3a0630ec-711b-4ed2-9846-d388c5457eb1','العاشر من رمضان','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('d282b457-fc6d-4ad4-b196-38ac84aa8219','31d94058-9f3a-4214-9f43-83976d66ade4','بدر','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('d2852220-99cc-484f-af92-0b2861368bc3','eb94b50e-1cc5-45bc-bfed-39edd60acb33','قها','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d2979b2b-8631-4fa3-86f5-3ebf6f1f90d0','6b9fa5d5-e506-48b8-8538-71aed7f74808','الزقازيق','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('d2ab8236-969d-4ee0-ad75-467e92f51fd8','4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','الباجور','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('d412f8c7-0624-4e39-85aa-f25da4ab9706','50a70a99-9d38-4378-b559-5a0dbd67b161','نقادة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('d42948b3-aef5-4d00-a5af-705dff84517d','63a6815e-8b5e-4d2b-9217-6764e8a14d19','نبروه','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d4826dea-40af-4f4a-a5f7-df3a00f870d8','03487283-f8b8-4fed-bb38-397798eb3601','الحوامدية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('d4cd88a6-42eb-48ad-9cbc-12feadddad77','32f67e21-6aa2-4bf8-ac48-a26310ba9906','ميت أبو غالب','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('d5d980ec-e014-4705-b7b1-19d3d60a5ac6','1a99feee-6a40-4988-a798-8c11978358df','السويس','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d68f9c9a-ed76-49f8-a4e5-8c0ce3eddcfa','63a6815e-8b5e-4d2b-9217-6764e8a14d19','محلة دمنة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('d970cb5b-0d9d-4b42-a610-f7ee8e86d005','d2987377-dfd6-4d83-8d73-a83dbe5f7530','نويبع','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('d9bfd1f7-8f0a-48b6-a52b-2b8bd4051909','3a0630ec-711b-4ed2-9846-d388c5457eb1','الخليفة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('da320495-5e81-41af-932b-9fdc86924030','03487283-f8b8-4fed-bb38-397798eb3601','منشأة البكاري','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('dd45c8f6-72d7-40a2-88a6-c605ade36ef1','03487283-f8b8-4fed-bb38-397798eb3601','كرداسة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('ddadb06f-4d25-4d18-ba5c-8232b321aba7','c4dbc8e7-549e-4bce-ae29-91c736a8ff33','الفيوم الجديدة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('ddcdeef3-ccbd-434e-ac2e-72d3709a2123','3a0630ec-711b-4ed2-9846-d388c5457eb1','الظاهر','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('de4248d9-adb3-4350-b5c5-1f33cf920d38','26b500a4-c361-4418-976f-31d769b44d24','ابوسمبل السياحية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('deb4227c-3bee-4d3a-87ae-45fd99527501','26b500a4-c361-4418-976f-31d769b44d24','مرسى علم','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('dffa2a20-7953-4160-9778-b493533d4ee3','2ff12ee0-3e7b-4cd6-84e0-894838774749','الحامول','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('e0c9dd96-bfdf-4ca3-bee8-e7f9d5ba33d6','31d94058-9f3a-4214-9f43-83976d66ade4','إدكو','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('e13b2b48-e8e9-48bc-99df-e7aef25f3f27','6b9fa5d5-e506-48b8-8538-71aed7f74808','أبو حماد','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('e156ee99-e196-47d9-9d18-204dc8c7b3ff','eb94b50e-1cc5-45bc-bfed-39edd60acb33','قليوب','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('e1f0f54b-0687-4e09-af94-8109ebb195d5','3a0630ec-711b-4ed2-9846-d388c5457eb1','الحلمية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e2734c6e-5769-40f5-b555-6dd48f4c95f9','19a0685c-975d-4667-b3ae-015c1313e53b','حى الزهور','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('e2b3ed89-ef68-4cbd-b74c-4dcbaa451e1d','4775a4a6-101a-43b9-a5f5-4d0c60ded625','بني سويف الجديدة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('e3495f87-db98-4903-9f07-500da72e26df','50a70a99-9d38-4378-b559-5a0dbd67b161','قنا','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('e493d912-9924-4237-8da1-f35c69f01c77','3a0630ec-711b-4ed2-9846-d388c5457eb1','قصر النيل','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e5593815-0abf-4dcb-ad8e-147e0f9b1552','63a6815e-8b5e-4d2b-9217-6764e8a14d19','أجا','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('e56df29f-f5c0-4a48-90c2-7763deac6f47','054769fe-5fc5-4e1e-80b0-29540da931c0','الجمرك','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('e5f83697-4bbb-4690-aee8-66ff4238d607','3995d987-3263-460b-b453-a62c21fd6050','سمالوط','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('e62ee93a-6c7c-41d1-8024-881a633cf985','26b500a4-c361-4418-976f-31d769b44d24','نصر النوبة','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('e7815fb3-9040-4a7d-a7d5-a2f3eb736442','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','مرسى مطروح','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('e7c6502f-d985-4640-b29c-cd8d184ba769','3a0630ec-711b-4ed2-9846-d388c5457eb1','طره','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('e7d29eed-80b9-4f4d-8d9e-f9871e2e2dfd','054769fe-5fc5-4e1e-80b0-29540da931c0','ابو قير','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e808ee40-7d61-4d60-a4b2-8f6f88cca3cc','03487283-f8b8-4fed-bb38-397798eb3601','البدرشين','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('e8237e13-0b63-4bb9-ac4b-96a0026139d9','03487283-f8b8-4fed-bb38-397798eb3601','أبو النمرس','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('ea1af02c-a881-43bb-93fa-5dcec457b509','03487283-f8b8-4fed-bb38-397798eb3601','الدقى','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('eaa6abe6-3e11-4d2e-8d68-1d47c980f49c','19a0685c-975d-4667-b3ae-015c1313e53b','العرب','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('eae0428f-924c-49b9-ae9c-129254e71792','d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','ديروط','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ed6e75d3-9838-4e6d-aac4-1400ea5ad27a','63a6815e-8b5e-4d2b-9217-6764e8a14d19','المنصورة','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('ee481993-7ff2-4f3a-bdaf-b3facab38d95','054769fe-5fc5-4e1e-80b0-29540da931c0','الدخيلة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('ef1fdbb9-156a-41fc-b5ee-db41d5501bff','03487283-f8b8-4fed-bb38-397798eb3601','منشأة القناطر','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('ef61973a-519f-4d97-b951-4d30cbbe73fc','054769fe-5fc5-4e1e-80b0-29540da931c0','مينا البصل','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('f0637fc6-837d-4fa7-997d-bc5297be573e','50a70a99-9d38-4378-b559-5a0dbd67b161','فرشوط','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('f0ee73ca-082e-44bd-b4f8-f4872c3dddd8','03487283-f8b8-4fed-bb38-397798eb3601','السادس من أكتوبر','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('f0f5e813-8bdb-4421-a7dc-e8f1e8018ce0','054769fe-5fc5-4e1e-80b0-29540da931c0','كامب شيزار','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('f135bda3-a684-4f26-81d9-defa26178db9','054769fe-5fc5-4e1e-80b0-29540da931c0','العجمي','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('f194e665-3e46-4272-b582-4fb53f900d87','32f67e21-6aa2-4bf8-ac48-a26310ba9906','عزبة البرج','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f217388e-da25-47f2-a7ea-03bdb081a99e','03487283-f8b8-4fed-bb38-397798eb3601','الحرانية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('f48418ba-3e76-4d42-bf11-dd3c9a3d5b3a','6b9fa5d5-e506-48b8-8538-71aed7f74808','منيا القمح','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f5188029-0da4-4769-a0bd-0f0b3d5491f3','03487283-f8b8-4fed-bb38-397798eb3601','القرية الذكية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('f51add73-ee2c-4fee-8a8c-219a59344db6','054769fe-5fc5-4e1e-80b0-29540da931c0','ستانلى','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('f5d9abb9-4ba6-4c1c-9b15-5de123cf9fdf','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','شبين الكوم','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('f6da9115-f2b9-469a-98ba-c24e59ed8d22','054769fe-5fc5-4e1e-80b0-29540da931c0','المنشية','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('f700a3e1-25d9-40df-8028-cb41fdfe7db5','4775a4a6-101a-43b9-a5f5-4d0c60ded625','ببا','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('f76df5a3-287d-431b-be14-978f5574a9bf','054769fe-5fc5-4e1e-80b0-29540da931c0','جليم','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('f782755b-7fb5-44fe-a527-eca42a954826','fd597d05-e8ca-4c88-a270-dedf07e8bade','الحسنة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('f8b21779-bcfc-454b-b819-c94be8736607','3a0630ec-711b-4ed2-9846-d388c5457eb1','السيدة زينب','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('f9381993-2b5f-4aae-ba57-4ac9487e6111','6b9fa5d5-e506-48b8-8538-71aed7f74808','أولاد صقر','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('f9a6cba4-491c-4cd7-aaaa-bacf22d2fbae','894cb001-e9b0-43bf-8bcf-db953ebc4e98','كفر الزيات','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('fa0f35c7-2fed-4a43-8818-9ff7902f9251','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','القصاصين الجديدة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('fad636b2-44dc-4912-91a3-152a73a8c219','03487283-f8b8-4fed-bb38-397798eb3601','بولاق الدكرور','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('faecd0a1-34d8-41d0-87bb-6c7aeb6e0fbc','50a70a99-9d38-4378-b559-5a0dbd67b161','قنا الجديدة','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('fb445afd-5f60-49ff-89f2-585abcb416c3','eb94b50e-1cc5-45bc-bfed-39edd60acb33','شبين القناطر','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('fbc60a7a-c865-458b-be3f-5adb72b039eb','31d94058-9f3a-4214-9f43-83976d66ade4','شبراخيت','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('fbea947c-8051-4327-a87b-fe4e16a63ed3','054769fe-5fc5-4e1e-80b0-29540da931c0','باب شرق','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('fc4fa9b6-b55c-4cbe-aeb3-3d47c1e11b92','3a0630ec-711b-4ed2-9846-d388c5457eb1','العتبة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('fc69d517-1c7f-4efe-89c0-6f41bf7b9738','2ce9e59e-de6c-4bd9-9935-4b081e23c884','سوهاج','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('fc8d3840-c127-46ff-a230-cdd07440451d','054769fe-5fc5-4e1e-80b0-29540da931c0','مارينا','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('fcb80c73-5f99-43f9-940e-917d2ae5b463','63a6815e-8b5e-4d2b-9217-6764e8a14d19','شربين','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('fcbdbea2-1d2d-494b-9e44-3526b8d6badf','3a0630ec-711b-4ed2-9846-d388c5457eb1','المقطم','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('fd11bfcf-5fb1-4c43-802f-63bb6ab885ba','4775a4a6-101a-43b9-a5f5-4d0c60ded625','سمسطا','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('fd1e88e4-6ab3-4fdf-8a23-61528ddbea88','ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','القنطرة شرق','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('fd2a5b1b-c039-4624-8d64-264ae2a1806b','3995d987-3263-460b-b453-a62c21fd6050','ملوي','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('fd85c368-60c2-4d0f-b975-dedd86670110','31d94058-9f3a-4214-9f43-83976d66ade4','كوم حمادة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('fe9df9fd-4f9a-443d-a37e-b1d84e660302','4775a4a6-101a-43b9-a5f5-4d0c60ded625','الفشن','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ff89b1ba-cfbe-426c-aa9e-e97f22bd62d5','1a99feee-6a40-4988-a798-8c11978358df','العين السخنة','2025-04-28 15:26:33','2025-04-28 15:26:33');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decision_types`
--

DROP TABLE IF EXISTS `decision_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `decision_types` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `decision_types_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decision_types`
--

LOCK TABLES `decision_types` WRITE;
/*!40000 ALTER TABLE `decision_types` DISABLE KEYS */;
INSERT INTO `decision_types` VALUES
('1fc39eec-c714-4712-973a-fbc93733e7bc','رئيس مجلس الوزراء ','2025-04-29 11:09:22','2025-04-29 11:09:22'),
('29887624-b6dd-4630-900f-a1f73d1e80c8','مجلس إدارة الصندوق','2025-05-06 09:44:04','2025-05-06 09:44:04'),
('c1ec4c22-b5a7-4901-94e6-72665d74dbcf','قرار محافظ ','2025-04-29 11:09:23','2025-04-29 11:09:23');
/*!40000 ALTER TABLE `decision_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES
('214f9847-9362-489b-9c60-3aa3ebac79a9','الهندسية','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('40dd2d94-04ee-487d-8dad-ed3b21245d6a','القانونية','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('72bd59f9-a04e-414d-b668-c83fc9ab2b57','المالية','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('7acca323-ad18-45ce-801e-05ec2075fb0c','الاستثمار','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('b944d8a7-e6b8-4c5e-8275-bcb5fcd35c4e','البحوث','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('cbbdca8a-d15b-4b43-b5a0-42b402716551','الدعم','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('cc52af45-46e9-409a-91f4-396a63bfecd4','نظم المعلومات','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('d0212885-f294-43c8-9585-ac2f87861755','المكتب الفني','2025-04-28 15:26:28','2025-04-28 15:26:28');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edit_request_origins`
--

DROP TABLE IF EXISTS `edit_request_origins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `edit_request_origins` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `edit_request_origins_user_id_foreign` (`user_id`),
  KEY `edit_request_origins_origin_id_foreign` (`origin_id`),
  CONSTRAINT `edit_request_origins_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `edit_request_origins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edit_request_origins`
--

LOCK TABLES `edit_request_origins` WRITE;
/*!40000 ALTER TABLE `edit_request_origins` DISABLE KEYS */;
INSERT INTO `edit_request_origins` VALUES
('3d6dca50-b049-4e3d-82fe-c7976f74cfc9','approved','2025-05-27 09:22:00','2025-05-27 09:22:07','8c82d771-63ae-4740-9ef8-b55a33b5821b','ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c'),
('40141f29-e8c3-4eaa-a1ca-a7321f87b14b','approved','2025-06-02 06:52:55','2025-06-02 06:53:11','8c82d771-63ae-4740-9ef8-b55a33b5821b','f1adfec5-664d-4b68-8e46-7b05a438c5f4');
/*!40000 ALTER TABLE `edit_request_origins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'db19fbab-154c-410f-b60c-5d861f147d43',
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
INSERT INTO `failed_jobs` VALUES
('db19fbab-154c-410f-b60c-5d861f147d43','09c1bd9a-fc94-461a-8539-393b626a3823','database','default','{\"uuid\":\"09c1bd9a-fc94-461a-8539-393b626a3823\",\"displayName\":\"App\\\\Notifications\\\\CreateOriginNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;s:36:\\\"8c82d771-63ae-4740-9ef8-b55a33b5821b\\\";}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:42:\\\"App\\\\Notifications\\\\CreateOriginNotification\\\":3:{s:6:\\\"origin\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Origin\\\";s:2:\\\"id\\\";N;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";N;s:15:\\\"collectionClass\\\";N;}s:6:\\\"sender\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";s:36:\\\"8c82d771-63ae-4740-9ef8-b55a33b5821b\\\";s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"2dd4d6dd-eec0-48e1-ab64-48aef8985e62\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}','Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\Models\\Origin]. in /var/www/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:621\nStack trace:\n#0 /var/www/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(109): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 /var/www/vendor/laravel/framework/src/Illuminate/Queue/SerializesAndRestoresModelIdentifiers.php(62): Illuminate\\Notifications\\Notification->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 /var/www/vendor/laravel/framework/src/Illuminate/Queue/SerializesModels.php(93): Illuminate\\Notifications\\Notification->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: Illuminate\\Notifications\\Notification->__unserialize(Array)\n#4 /var/www/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(97): unserialize(\'O:48:\"Illuminat...\')\n#5 /var/www/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(60): Illuminate\\Queue\\CallQueuedHandler->getCommand(Array)\n#6 /var/www/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#7 /var/www/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#8 /var/www/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#9 /var/www/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 /var/www/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(137): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#11 /var/www/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(120): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#12 /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#13 /var/www/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 /var/www/vendor/laravel/framework/src/Illuminate/Container/Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 /var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call(Array)\n#18 /var/www/vendor/symfony/console/Command/Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 /var/www/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#20 /var/www/vendor/symfony/console/Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 /var/www/vendor/symfony/console/Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 /var/www/vendor/symfony/console/Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /var/www/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /var/www/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 {main}','2025-06-02 12:06:22');
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `governments`
--

DROP TABLE IF EXISTS `governments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `governments` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `governments_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `governments`
--

LOCK TABLES `governments` WRITE;
/*!40000 ALTER TABLE `governments` DISABLE KEYS */;
INSERT INTO `governments` VALUES
('03487283-f8b8-4fed-bb38-397798eb3601','الجيزة','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('054769fe-5fc5-4e1e-80b0-29540da931c0','الأسكندرية','2025-04-28 15:26:30','2025-04-28 15:26:30'),
('19a0685c-975d-4667-b3ae-015c1313e53b','بورسعيد','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('1a99feee-6a40-4988-a798-8c11978358df','السويس','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('26b500a4-c361-4418-976f-31d769b44d24','اسوان','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('2ce9e59e-de6c-4bd9-9935-4b081e23c884','سوهاج','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('2ff12ee0-3e7b-4cd6-84e0-894838774749','كفر الشيخ','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('31d94058-9f3a-4214-9f43-83976d66ade4','البحيرة','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('32f67e21-6aa2-4bf8-ac48-a26310ba9906','دمياط','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('3995d987-3263-460b-b453-a62c21fd6050','المنيا','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('3a0630ec-711b-4ed2-9846-d388c5457eb1','القاهرة','2025-04-28 15:26:29','2025-04-28 15:26:29'),
('4775a4a6-101a-43b9-a5f5-4d0c60ded625','بني سويف','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('4ed06fcc-ca0f-4161-b6f8-6fea29f8b658','المنوفية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('50a70a99-9d38-4378-b559-5a0dbd67b161','قنا','2025-04-28 15:26:35','2025-04-28 15:26:35'),
('5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','مطروح','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('63a6815e-8b5e-4d2b-9217-6764e8a14d19','الدقهلية','2025-04-28 15:26:31','2025-04-28 15:26:31'),
('6b9fa5d5-e506-48b8-8538-71aed7f74808','الشرقية','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('8397232a-163d-4a09-8e0c-9fa339e76497','البحر الأحمر','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('894cb001-e9b0-43bf-8bcf-db953ebc4e98','الغربية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('9d091593-1817-4565-9fe2-123eb626fc1d','الوادي الجديد','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('ac79ea7a-b0e4-4e86-aadd-eead9c8d22c2','الإسماعلية','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('c4dbc8e7-549e-4bce-ae29-91c736a8ff33','الفيوم','2025-04-28 15:26:32','2025-04-28 15:26:32'),
('d11e33d5-0f9c-41ea-b7c8-2e0f1aa376a8','اسيوط','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('d2987377-dfd6-4d83-8d73-a83dbe5f7530','جنوب سيناء','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('eb94b50e-1cc5-45bc-bfed-39edd60acb33','القليوبية','2025-04-28 15:26:33','2025-04-28 15:26:33'),
('f183d7eb-93c2-4a9d-8a0b-80f97292f436','الأقصر','2025-04-28 15:26:34','2025-04-28 15:26:34'),
('fd597d05-e8ca-4c88-a270-dedf07e8bade','شمال سيناء','2025-04-28 15:26:35','2025-04-28 15:26:35');
/*!40000 ALTER TABLE `governments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_titles`
--

DROP TABLE IF EXISTS `job_titles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_titles` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_titles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_titles`
--

LOCK TABLES `job_titles` WRITE;
/*!40000 ALTER TABLE `job_titles` DISABLE KEYS */;
INSERT INTO `job_titles` VALUES
('5344a9c7-804b-490b-a650-fe3bc5fa7aab','مدير عام البنية التحتية وتأمين المعلومات','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('6da764d9-bf25-44df-af15-130d21f9024d','مراجع','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('93569d07-a617-445b-8b76-1530a8504be4','مشاهد','2025-05-28 11:49:39','2025-05-28 11:49:39'),
('c969eed4-c2f2-4b5e-a831-d4e6208c5f84','مدخل بيانات','2025-04-28 15:26:28','2025-04-28 15:36:32');
/*!40000 ALTER TABLE `job_titles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locked_origins`
--

DROP TABLE IF EXISTS `locked_origins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `locked_origins` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `origin_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locked_origins_origin_id_foreign` (`origin_id`),
  CONSTRAINT `locked_origins_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locked_origins`
--

LOCK TABLES `locked_origins` WRITE;
/*!40000 ALTER TABLE `locked_origins` DISABLE KEYS */;
INSERT INTO `locked_origins` VALUES
('fd1204cd-4bc8-4282-9856-63a4cf290489','2025-06-17 11:24:35','2025-06-17 11:24:35','133464b3-9283-4b66-89f7-a799c38d796d');
/*!40000 ALTER TABLE `locked_origins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2023_09_19_091155_create_sessions_table',1),
(7,'2023_09_19_105030_create_permission_tables',1),
(8,'2024_02_29_234800_create_cache_table',1),
(9,'2024_12_05_123051_create_departments_table',1),
(10,'2024_12_06_142955_add_department_id_to_users_table',1),
(11,'2024_12_06_151154_create_governments_table',1),
(12,'2024_12_06_151240_create_cities_table',1),
(13,'2024_12_7_204914_create_companies_table',1),
(14,'2025_02_02_030039_create_projects_table',1),
(15,'2025_02_03_010756_create_decision_types_table',1),
(16,'2025_02_03_010757_create_statements_table',1),
(18,'2025_04_17_111506_create_job_titles_table',1),
(19,'2025_04_17_111507_add_job_title_id_to_users_table',1),
(20,'2025_04_21_180901_create_responsibilities_table',1),
(21,'2025_04_21_180902_create_responsibility_user_table',1),
(22,'2025_04_22_174541_create_activity_log_table',1),
(23,'2025_04_22_174542_add_event_column_to_activity_log_table',1),
(24,'2025_04_22_174543_add_batch_uuid_column_to_activity_log_table',1),
(25,'2025_04_22_183721_change_columns_id_to_uuid_in_activity_log',1),
(26,'2025_02_03_010807_create_origins_table',2),
(28,'2025_02_03_010808_create_origins_table',3),
(29,'2025_05_04_103401_create_buildings_table',4),
(30,'2025_05_11_190501_create_locked_origins_table',4),
(31,'2025_05_11_192312_create_edit_request_origins_table',4),
(32,'2025_05_17_212526_add_columns_to_origins_table',4),
(33,'2025_05_31_010209_add_coordinated_by_to_origins_table',5),
(37,'2025_06_02_105118_create_notifications_table',6),
(38,'2025_06_02_105121_create_jobs_table',6),
(39,'2025_07_14_133810_create_origin_statement_table',7),
(40,'2025_07_21_180538_remove_statement_id_from_origins_table',8),
(41,'2025_07_21_185739_create_origin_details_table',9),
(42,'2025_07_22_092554_add_columns_to_origins_table',10),
(43,'2025_08_12_170104_create_type_services_table',11),
(44,'2025_08_12_181355_add_columns_to_origin_details_table',11),
(45,'2025_08_12_205006_create_origin_services_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES
('852e3803-d5f3-4086-8460-359d2829a0f8','App\\Models\\User','1a21e4dd-be52-4b40-b2d6-e73c17f28824'),
('852e3803-d5f3-4086-8460-359d2829a0f8','App\\Models\\User','507e4996-9cd3-4732-8a24-a22b6035f03b'),
('9129a810-fc4a-476d-923f-efeaa598a999','App\\Models\\User','6f99322f-79bc-4cf4-86fb-2dd2330556a7'),
('6d6cdaac-23c0-4635-b41a-01fb0d8fa175','App\\Models\\User','8477fe7e-9650-4e45-bc88-d9542d71cc53'),
('a7607302-8f22-4396-b9d4-7795a118bfb4','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b'),
('7ac67971-f0c4-4142-9038-476b1f3a3088','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('852e3803-d5f3-4086-8460-359d2829a0f8','App\\Models\\User','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('6d6cdaac-23c0-4635-b41a-01fb0d8fa175','App\\Models\\User','b487eaf4-1582-4966-aace-bfa3a3a272d1'),
('7ac67971-f0c4-4142-9038-476b1f3a3088','App\\Models\\User','b487eaf4-1582-4966-aace-bfa3a3a272d1'),
('6d6cdaac-23c0-4635-b41a-01fb0d8fa175','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3'),
('852e3803-d5f3-4086-8460-359d2829a0f8','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3'),
('a7607302-8f22-4396-b9d4-7795a118bfb4','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa');
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES
('06308e57-628e-4b27-a518-51fd68f9239f','App\\Notifications\\OriginNotification','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644.\"}','2025-06-17 08:17:57','2025-06-17 08:00:39','2025-06-17 08:17:57'),
('08be3956-b2c9-45f8-ac05-ac5f7d7361a3','App\\Notifications\\OriginNotification','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"origin_id\":\"ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 108 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0623\\u0645\\u0627\\u0645 \\u0627\\u0644\\u062d\\u0631\\u0633 \\u0627\\u0644\\u062c\\u0645\\u0647\\u0648\\u0631\\u064a \\u0628\\u0637\\u0631\\u064a\\u0642 \\u0627\\u0644\\u062c\\u0648\\u0646\\u0629 \\u0628\\u0627\\u0644\\u0638\\u0647\\u064a\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u062d\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"SuperAdmin\",\"message\":\"**ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d SuperAdmin.\"}','2025-06-11 09:00:14','2025-06-03 10:12:23','2025-06-11 09:00:14'),
('08f7c72f-21b2-437d-a0ec-27bd3971673a','App\\Notifications\\OriginNotification','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644.\"}',NULL,'2025-06-17 07:42:12','2025-06-17 07:42:12'),
('0b73662f-b5ff-47b4-b82e-ef2c7fca0f9a','App\\Notifications\\OriginNotification','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"origin_id\":\"a8b81ff9-507a-489e-9694-19abbc8bb84c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 80 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0628\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0627\\u0632 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0627\\u0644\\u0628\\u062f\\u0627\\u0631\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**a8b81ff9-507a-489e-9694-19abbc8bb84c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}','2025-06-24 08:05:07','2025-06-16 07:47:51','2025-06-24 08:05:07'),
('10f62bd8-7338-4247-a428-ee68937b0199','App\\Notifications\\OriginNotification','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644.\"}','2025-06-24 08:05:09','2025-06-17 08:00:38','2025-06-24 08:05:09'),
('17d81a9a-3fe1-4e1f-983e-8a4dbf6dfc2a','App\\Notifications\\OriginNotification','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"origin_id\":\"a8b81ff9-507a-489e-9694-19abbc8bb84c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 80 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0628\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0627\\u0632 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0627\\u0644\\u0628\\u062f\\u0627\\u0631\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**a8b81ff9-507a-489e-9694-19abbc8bb84c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}','2025-06-24 08:05:04','2025-06-16 07:46:28','2025-06-24 08:05:04'),
('1f1e8fc6-ef8f-4e66-8eb0-dceef194ac72','App\\Notifications\\OriginNotification','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}',NULL,'2025-06-17 11:45:31','2025-06-17 11:45:31'),
('2532a53c-7647-4076-a246-8e38f005ffe6','App\\Notifications\\OriginNotification','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"origin_id\":\"a8b81ff9-507a-489e-9694-19abbc8bb84c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 80 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0628\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0627\\u0632 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0627\\u0644\\u0628\\u062f\\u0627\\u0631\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**a8b81ff9-507a-489e-9694-19abbc8bb84c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}',NULL,'2025-06-16 07:46:30','2025-06-16 07:46:30'),
('2ee36e3c-e1ca-4102-a28e-18976bdafb5b','App\\Notifications\\OriginNotification','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"origin_id\":\"ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 108 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0623\\u0645\\u0627\\u0645 \\u0627\\u0644\\u062d\\u0631\\u0633 \\u0627\\u0644\\u062c\\u0645\\u0647\\u0648\\u0631\\u064a \\u0628\\u0637\\u0631\\u064a\\u0642 \\u0627\\u0644\\u062c\\u0648\\u0646\\u0629 \\u0628\\u0627\\u0644\\u0638\\u0647\\u064a\\u0631 \\u0627\\u0644\\u0633\\u064a\\u0627\\u062d\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"SuperAdmin\",\"message\":\"**ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d SuperAdmin.\"}',NULL,'2025-06-03 10:12:25','2025-06-03 10:12:25'),
('3f87dbdc-1ca1-4ed8-beae-a6e82c213274','App\\Notifications\\OriginNotification','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}','2025-06-24 08:05:10','2025-06-17 11:45:29','2025-06-24 08:05:10'),
('40389d88-4ab5-4b35-a4c6-25b5573b1f51','App\\Notifications\\OriginNotification','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644.\"}',NULL,'2025-06-17 07:42:10','2025-06-17 07:42:10'),
('64501f37-d994-47aa-83b0-117e3ce4a2e9','App\\Notifications\\OriginNotification','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644.\"}',NULL,'2025-06-17 08:00:40','2025-06-17 08:00:40'),
('87cd0d04-5886-4ca0-ae6b-689a5c8061ce','App\\Notifications\\OriginNotification','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"origin_id\":\"a8b81ff9-507a-489e-9694-19abbc8bb84c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 80 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0628\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0627\\u0632 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0627\\u0644\\u0628\\u062f\\u0627\\u0631\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**a8b81ff9-507a-489e-9694-19abbc8bb84c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}',NULL,'2025-06-16 07:46:31','2025-06-16 07:46:31'),
('97a5b4a4-3407-484b-8644-f2f31eb0c6db','App\\Notifications\\OriginNotification','App\\Models\\User','8c82d771-63ae-4740-9ef8-b55a33b5821b','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0645\\u0627\\u062f \\u0643\\u0645\\u0627\\u0644.\"}','2025-06-24 08:05:08','2025-06-17 07:42:09','2025-06-24 08:05:08'),
('a6eae781-ad88-4a01-b261-3d0d0d8b4066','App\\Notifications\\OriginNotification','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"origin_id\":\"133464b3-9283-4b66-89f7-a799c38d796d\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 1200 \\u0648\\u062d\\u062f\\u0629 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0641\\u0644\\u0627\\u0645\\u0646\\u0643\\u0648 \\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629 \\u2013 \\u0627\\u0644\\u0642\\u0635\\u064a\\u0631\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**133464b3-9283-4b66-89f7-a799c38d796d** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}',NULL,'2025-06-17 11:45:30','2025-06-17 11:45:30'),
('aa993c90-8126-40e8-a986-de55055b336c','App\\Notifications\\OriginNotification','App\\Models\\User','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','{\"origin_id\":\"a8b81ff9-507a-489e-9694-19abbc8bb84c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 80 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0628\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0627\\u0632 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0627\\u0644\\u0628\\u062f\\u0627\\u0631\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**a8b81ff9-507a-489e-9694-19abbc8bb84c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}',NULL,'2025-06-16 07:47:53','2025-06-16 07:47:53'),
('d626a42d-60d7-4c7e-9eab-7d16cc4820ba','App\\Notifications\\OriginNotification','App\\Models\\User','e28df551-c71f-4c6e-8d4f-27c75d870afa','{\"origin_id\":\"a8b81ff9-507a-489e-9694-19abbc8bb84c\",\"origin_name\":\"\\u062a\\u0646\\u0641\\u064a\\u0630 \\u0639\\u062f\\u062f 80 \\u0639\\u0645\\u0627\\u0631\\u0629 \\u0628\\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0627\\u0632 \\u062a\\u0642\\u0633\\u064a\\u0645 \\u0627\\u0644\\u0628\\u062f\\u0627\\u0631\\u064a \\u2013 \\u0627\\u0644\\u063a\\u0631\\u062f\\u0642\\u0629\",\"sender_name\":\"\\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f\",\"message\":\"**a8b81ff9-507a-489e-9694-19abbc8bb84c** \\u062a\\u0645 \\u062a\\u0639\\u062f\\u064a\\u0644 \\u0627\\ufef7\\u0635\\u0644 \\u0628\\u0646\\u062c\\u0627\\u062d \\u0639\\u0628\\u062f \\u0627\\u0644\\u062d\\u0645\\u064a\\u062f \\u0645\\u062d\\u0645\\u062f.\"}',NULL,'2025-06-16 07:47:57','2025-06-16 07:47:57');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origin_details`
--

DROP TABLE IF EXISTS `origin_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `origin_details` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statement_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_area` decimal(8,2) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `origin_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_area` decimal(8,2) DEFAULT NULL,
  `number_of_buildings_executed` int DEFAULT NULL,
  `number_of_units` int DEFAULT NULL,
  `residential_units` int DEFAULT NULL,
  `administrative_units` int DEFAULT NULL,
  `commercial_units` int DEFAULT NULL,
  `commercial_shops` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `origin_details_origin_id_foreign` (`origin_id`),
  KEY `origin_details_statement_id_foreign` (`statement_id`),
  CONSTRAINT `origin_details_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `origin_details_statement_id_foreign` FOREIGN KEY (`statement_id`) REFERENCES `statements` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origin_details`
--

LOCK TABLES `origin_details` WRITE;
/*!40000 ALTER TABLE `origin_details` DISABLE KEYS */;
INSERT INTO `origin_details` VALUES
('08cfc612-54dc-4cbc-a8fd-c92ed5dd305b',NULL,NULL,NULL,'40e8dcfc-d87c-4958-aa4d-b17bb05110f3',90.00,50,1000,1000,NULL,NULL,NULL,'2025-08-06 16:13:17','2025-08-06 16:13:17'),
('0b137ec3-fcd5-4506-b532-1f1b2d7502b4',NULL,NULL,NULL,'8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc',90.00,15,300,NULL,NULL,NULL,NULL,'2025-08-06 16:09:22','2025-08-06 16:09:22'),
('0cdc5825-88c5-407b-9693-fef60dadfec7',NULL,NULL,NULL,'d37f766e-6d40-4626-b592-b3b53b0188bd',75.00,45,900,900,NULL,NULL,NULL,'2025-08-07 08:43:14','2025-08-07 08:43:14'),
('39d62bed-1620-4f19-8c40-41288b1ce635',NULL,NULL,NULL,'ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c',120.00,115,2300,2300,NULL,NULL,NULL,'2025-08-06 16:00:52','2025-08-06 16:00:52'),
('401776c4-a259-4a65-a922-bd3ba5b6f779',NULL,NULL,NULL,'8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc',90.00,7,140,136,4,NULL,NULL,'2025-08-06 16:09:22','2025-08-06 16:09:22'),
('49051268-c5c7-4db4-97f9-8140db35990a',NULL,NULL,NULL,'a8b81ff9-507a-489e-9694-19abbc8bb84c',120.00,46,920,920,NULL,NULL,NULL,'2025-08-07 08:22:12','2025-08-07 08:22:12'),
('5ab4c8b9-ac3a-4b1b-b546-a38f83540bc6',NULL,NULL,NULL,'d37f766e-6d40-4626-b592-b3b53b0188bd',90.00,35,700,700,NULL,NULL,NULL,'2025-08-07 08:43:14','2025-08-07 08:43:14'),
('5adbbd48-f283-4a8a-8f17-5d170ad0bb6f',NULL,NULL,NULL,'a19237b5-9d95-4e6d-ac97-80d6c372a4f4',100.00,200,NULL,NULL,NULL,NULL,NULL,'2025-07-22 09:52:38','2025-07-22 09:52:38'),
('769ea708-1e64-45ec-9e24-b38ed276cfae',NULL,NULL,NULL,'a8b81ff9-507a-489e-9694-19abbc8bb84c',120.00,18,360,360,NULL,10,40,'2025-08-07 08:22:12','2025-08-07 08:22:12'),
('9e74e974-10a7-4705-90f6-e0560dfef7b2',NULL,NULL,NULL,'0fcbcbd8-1c21-4799-ad3a-e02975839dd6',90.00,19,304,304,NULL,NULL,NULL,'2025-08-06 16:16:47','2025-08-06 16:16:47'),
('a0b1001b-9541-4d7b-a909-23cf0ef40832',NULL,NULL,NULL,'d37f766e-6d40-4626-b592-b3b53b0188bd',90.00,255,5100,5100,NULL,NULL,NULL,'2025-08-07 08:43:14','2025-08-07 08:43:14'),
('aed33bf6-7bf2-4c3c-9287-e1acdc34e992',NULL,NULL,NULL,'183885e1-7681-42cf-a63c-99fecd470fa3',90.00,31,496,496,NULL,NULL,NULL,'2025-08-06 16:15:53','2025-08-06 16:15:53'),
('d35ef01b-fa06-4e15-b747-5619fbfd002c',NULL,NULL,NULL,'34f0e90c-c6e9-4f64-917b-0a7200cefee5',90.00,126,2520,2504,NULL,12,18,'2025-08-06 16:15:01','2025-08-06 16:15:01'),
('e7b817ec-b40c-478e-8200-456c5020f6af',NULL,NULL,NULL,'9b372dd0-c0c6-497b-8c7b-3592ab39182a',90.00,14,168,168,NULL,NULL,NULL,'2025-08-06 16:02:25','2025-08-06 16:02:25'),
('efe9f0ac-f4d0-497a-b8e8-fd2d7f826dc3',NULL,NULL,NULL,'183885e1-7681-42cf-a63c-99fecd470fa3',90.00,54,808,808,NULL,NULL,NULL,'2025-08-06 16:15:53','2025-08-06 16:15:53');
/*!40000 ALTER TABLE `origin_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origin_services`
--

DROP TABLE IF EXISTS `origin_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `origin_services` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_service_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `origin_services_origin_id_foreign` (`origin_id`),
  KEY `origin_services_type_service_id_foreign` (`type_service_id`),
  CONSTRAINT `origin_services_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `origin_services_type_service_id_foreign` FOREIGN KEY (`type_service_id`) REFERENCES `type_services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origin_services`
--

LOCK TABLES `origin_services` WRITE;
/*!40000 ALTER TABLE `origin_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `origin_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origins`
--

DROP TABLE IF EXISTS `origins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `origins` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision_num` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decision_date` year DEFAULT NULL,
  `decision_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decision_type_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_area_allocated` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_area_coords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacant_buildings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location_status` enum('accept','good','very_good','excellent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'accept',
  `origin_status` enum('inprogress','revision','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inprogress',
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revised_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `government_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executing_entity_num` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinates` json DEFAULT NULL,
  `record_status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `coordinated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `origins_project_id_foreign` (`project_id`),
  KEY `origins_decision_type_id_foreign` (`decision_type_id`),
  KEY `origins_government_id_foreign` (`government_id`),
  KEY `origins_city_id_foreign` (`city_id`),
  KEY `origins_created_by_foreign` (`created_by`),
  KEY `origins_revised_by_foreign` (`revised_by`),
  KEY `origins_completed_by_foreign` (`completed_by`),
  KEY `origins_coordinated_by_foreign` (`coordinated_by`),
  CONSTRAINT `origins_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `origins_completed_by_foreign` FOREIGN KEY (`completed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `origins_coordinated_by_foreign` FOREIGN KEY (`coordinated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `origins_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `origins_decision_type_id_foreign` FOREIGN KEY (`decision_type_id`) REFERENCES `decision_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `origins_government_id_foreign` FOREIGN KEY (`government_id`) REFERENCES `governments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `origins_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `origins_revised_by_foreign` FOREIGN KEY (`revised_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origins`
--

LOCK TABLES `origins` WRITE;
/*!40000 ALTER TABLE `origins` DISABLE KEYS */;
INSERT INTO `origins` VALUES
('05c3e92e-ab0e-4394-8add-5fc0b9287a53','0',2020,'decision-images/S5eUVsM918MckHe92exhY8cuZnwMpCP6ivyiSEqX.pdf','29887624-b6dd-4630-900f-a1f73d1e80c8','100','100','100','0','0','0','الوحدة رقم (20704) الدور السابع فوق الأرضي نموذج B المبني الهرمي المسمي (خفرع)','accept','inprogress','507e4996-9cd3-4732-8a24-a22b6035f03b',NULL,NULL,'مملوكة','2025-05-06 09:48:09','2025-05-06 09:48:09','05b12ba5-a111-42f2-8a20-e5b0cff856ab','1a99feee-6a40-4988-a798-8c11978358df','ff89b1ba-cfbe-426c-aa9e-e97f22bd62d5','0',NULL,'no',NULL),
('0bf2f408-7733-47f9-8805-9847cc3408cd','568',2021,'decision-images/tFCgRQ5FDQImOj4X9JGUpSlff4vVUT7otWJYmdmW.pdf','1fc39eec-c714-4712-973a-fbc93733e7bc','610977','0','0','610977','0','500','تقسيم الحجاز منطقة أبوعشرة الطريق الدائري ','good','inprogress','507e4996-9cd3-4732-8a24-a22b6035f03b',NULL,NULL,'لم تنفذ العمارات حتى الآن ','2025-05-04 03:34:11','2025-05-29 13:05:27','716e0bae-b7f4-4f7b-baa7-4d40c76d9ab0','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','0','[[[579284.8234999999, 3012144.7095999992], [579462.8074000002, 3011540.9017], [579543.8153000013, 3011562.6526000006], [579570.5827, 3011506.5144], [579509.6614000008, 3011440.890300001], [579059.9583000011, 3011778.3361], [578712.4340000004, 3011232.4122], [578523.4731000005, 3010925.0491999993], [578225.7339000003, 3010983.4777999995], [577854.3353000006, 3011119.9151], [578430.1279000005, 3011504.7878000005], [579284.8234999999, 3012144.7095999992]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('0fcbcbd8-1c21-4799-ad3a-e02975839dd6','781',2012,'decision-images/es12bOPdL0QtExCGkd3NDv4mXcB4Zfy9a8nEjRlH.pdf','c1ec4c22-b5a7-4901-94e6-72665d74dbcf','22867.47','26105.469879629','22867','0','0','0','تقسيم المركز السياحي ','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,NULL,'2025-05-04 03:34:11','2025-08-06 16:16:46','5b61a48d-df8d-431c-9b26-6da06ded6061','8397232a-163d-4a09-8e0c-9fa339e76497','254eb4b1-4d6c-49bd-bbe7-82d8c477c69c','19','[[[626635.7019000005, 2890151.0807], [626742.2852000012, 2890224.3729999997], [626823.3108000002, 2890143.474899998], [626770.1450999997, 2890107.0467000008], [626852.2687999993, 2889977.7246999997], [626836.4910000004, 2889967.9222], [626753.0392999998, 2889985.956399999], [626635.7019000005, 2890151.0807]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('12782081-8b6f-49c8-b0df-c0dd0b5b66bc','0',2020,NULL,'29887624-b6dd-4630-900f-a1f73d1e80c8','79','79','79','0','0','0','شالية رقم (621) الدور السادس فوق الأرضي','accept','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,'مملوكة','2025-05-06 09:45:27','2025-08-06 16:17:45','11c9bce4-bda1-4dc3-bfe3-df93fad563c7','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363','0',NULL,'no',NULL),
('133464b3-9283-4b66-89f7-a799c38d796d','2524',2023,'decision-images/zxhsWterNvAGmaMEkwnV77ONvsxqhE3vGOyxtjmL.pdf','1fc39eec-c714-4712-973a-fbc93733e7bc','72000','74045.902586869','0','72000','72000','60','تقسيم فلامنكو المنطقة الثانية ','good','revision','94000ccb-1c41-432a-a716-8f1edfc98a19','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,'لم تنفذ العمارات حتى الآن ','2025-05-04 03:34:11','2025-06-17 11:24:35','30d550ac-cf60-40c6-895a-8dbb7cfa2528','8397232a-163d-4a09-8e0c-9fa339e76497','254eb4b1-4d6c-49bd-bbe7-82d8c477c69c','0','[[[624804.2123999997, 2890784.1292999997], [624869.9446000007, 2890765.0675], [625050.6693999997, 2890370.1782999993], [625044.8259000004, 2890313.5053], [624960.5214999997, 2890270.5401000003], [624913.5899000012, 2890327.3215], [624890.9191000002, 2890345.2581], [624820.1210999994, 2890486.7358999997], [624771.1377999996, 2890583.8068], [624763.6455999996, 2890640.9671], [624804.2123999997, 2890784.1292999997]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('183885e1-7681-42cf-a63c-99fecd470fa3','876',2012,'decision-images/1E3YHofIDjSzsf0AYbHoNkNvnXJoDCyq9dnwXFWe.pdf','c1ec4c22-b5a7-4901-94e6-72665d74dbcf','93900','77355.9578065','93900','0','0','0','منطقة غرب شارع الإذاعة ','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,'تم دمج جميع المناطق ','2025-05-04 03:34:11','2025-08-06 16:15:53','553484be-28ca-4097-9cac-3c210a3e4f18','8397232a-163d-4a09-8e0c-9fa339e76497','776efd16-c76e-4d71-a29b-c7dc7343bb2b','85','[[[3134506.9018999995, 508156.66639999975], [3134530.743799999, 508208.2569], [3134454.935500001, 508241.6443], [3134448.3357, 508222.66279999976], [3134333.524300003, 508284.93629999965], [3134325.6809000005, 508263.8981999999], [3134506.9018999995, 508156.66639999975]], [[3134381.4439999997, 508303.3544], [3134406.6244999995, 508294.42219999945], [3134412.4462, 508307.95449999993], [3134386.7908999985, 508318.69829999976], [3134381.4439999997, 508303.3544]], [[3134519.5139000006, 508278.6491000001], [3134524.9833, 508293.5568999999], [3134501.057499999, 508304.32359999965], [3134494.6872000005, 508288.5536], [3134519.5139000006, 508278.6491000001]], [[3134562.4027000004, 508395.2395000003], [3134567.009199999, 508408.54119999986], [3134542.9569000006, 508418.3842999999], [3134537.446999999, 508405.84110000025], [3134562.4027000004, 508395.2395000003]], [[3134516.0931, 508148.37729999993], [3134730.942600002, 508018.4630999998], [3134773.3055, 508121.7096000001], [3134545.481699999, 508213.6654999996], [3134516.0931, 508148.37729999993]], [[3134818.404200002, 508283.8257999998], [3134838.6160999984, 508338.0186000002], [3134852.3464999995, 508332.6704], [3134859.513900001, 508350.0327000003], [3134826.914499999, 508362.6939999999], [3134816.8395999996, 508337.6234], [3134776.595700001, 508353.71990000026], [3134756.5384999984, 508308.1964000001], [3134818.404200002, 508283.8257999998]], [[3135201.724, 508258.7198], [3135221.1208999995, 508307.4024999998], [3135169.5165999993, 508328.5241], [3135207.3050999995, 508424.3388], [3135165.384599999, 508439.9752999999], [3135130.4100000006, 508355.72439999995], [3134925.163099999, 508437.5586], [3134898.0842000013, 508367.6467999996], [3135201.724, 508258.7198]], [[3135373.590300002, 508580.7566000001], [3135409.5688999994, 508565.5680999997], [3135433.2295999997, 508613.0807], [3135480.7918, 508597.57030000014], [3135537.9789, 508740.3138], [3135496.1522000004, 508771.5622999998], [3135464.4607000006, 508754.14060000016], [3135446.1417, 508762.2339000004], [3135373.590300002, 508580.7566000001]], [[3135852.3269000016, 508382.82960000006], [3135851.462800001, 508538.02639999986], [3135826.109300001, 508539.4183999997], [3135786.2447, 508547.1118000002], [3135739.700800001, 508422.837], [3135852.3269000016, 508382.82960000006]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('265de0be-60a1-4a82-8108-d5c7a2b13204','0',2020,NULL,'29887624-b6dd-4630-900f-a1f73d1e80c8','110','110','110','0','0','0','الوحدة رقم (30806) الدور الثامن فوق الأرضي نموذج A المبني الهرمي المسمي (منقرع)','accept','inprogress','507e4996-9cd3-4732-8a24-a22b6035f03b',NULL,NULL,'مملوكة','2025-05-06 09:49:38','2025-05-06 09:49:38','71c98ba6-5cf3-4553-9a36-d27fe6a8350b','1a99feee-6a40-4988-a798-8c11978358df','ff89b1ba-cfbe-426c-aa9e-e97f22bd62d5','0',NULL,'no',NULL),
('34f0e90c-c6e9-4f64-917b-0a7200cefee5','503',2013,'decision-images/W7n0Ce0pvbPlJYEKlu6Yn330nN6Qc2DjzBD3hzRx.pdf','c1ec4c22-b5a7-4901-94e6-72665d74dbcf','210000','202341.27574643','210000','0','0','0','تقسيم شمال الأحياء ','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,NULL,'2025-05-04 03:34:11','2025-08-06 16:14:23','98f4004a-0c62-4daf-a2e7-bc37bca85658','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','126','[[[573520.3199999991, 3018917.7268], [573830.3173999996, 3018745.1243], [573848.1139, 3018705.6503], [573860.8031000005, 3018410.8478999995], [573454.6516000004, 3018401.8036], [573300.5689000003, 3018490.3712999993], [573297.5165000004, 3018513.438600001], [573520.3199999991, 3018917.7268]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('40e8dcfc-d87c-4958-aa4d-b17bb05110f3','66',2018,'decision-images/IP1jPbi9yujgNVR8pZuB5yKl1pyhWGmEgnuGxKkB.pdf','c1ec4c22-b5a7-4901-94e6-72665d74dbcf','96000','68027.787696351','96000','0','0','0','سيف هيكل ','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,NULL,'2025-05-04 03:34:11','2025-08-06 16:13:17','ca0a1f94-c970-4fbd-8514-c8f3e681a901','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','50','[[[579403.5021999993, 3012039.0033000004], [579642.8423000001, 3012109.4447999997], [579718.7779000001, 3011849.2266], [579481.0365000011, 3011776.2970999996], [579403.5021999993, 3012039.0033000004]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('45318d0e-a020-4859-bf6b-eff3220ae2da','0',2020,NULL,'29887624-b6dd-4630-900f-a1f73d1e80c8','132','132','132','0','0','0','شالية رقم (309) الدور الثالث فوق الأرضي','accept','inprogress','507e4996-9cd3-4732-8a24-a22b6035f03b',NULL,NULL,'مملوكة','2025-05-06 09:46:45','2025-05-06 09:46:45','db4ad9ea-a154-468a-a448-da91411e6956','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363','0',NULL,'no',NULL),
('7955112d-dbc7-4eb6-b1c9-e5b66b8c4b39','0',2020,NULL,'29887624-b6dd-4630-900f-a1f73d1e80c8','108','108','108','0','0','0','شالية رقم (6) الدور الثاني نموذج (ش 2/2)','accept','inprogress','1a21e4dd-be52-4b40-b2d6-e73c17f28824',NULL,NULL,'مملوكة','2025-05-06 09:43:43','2025-05-06 09:50:08','d5789031-9704-4f5a-9928-b13491d9dbe5','5cd5b5ee-44d5-4701-b8f5-eb380d5ee57c','28dbbe8c-539c-4d6f-9bb0-e1fa8a05b363','0',NULL,'no',NULL),
('8ec047d1-b9c0-4e45-a61e-8c1851ddd8bc','142',2014,'decision-images/l23J7p5HvakDXbY1Hrc8vtzTyREvcBvUJ1zTcFTA.pdf','c1ec4c22-b5a7-4901-94e6-72665d74dbcf','55500','38180.348635757','55500','0','0','0','تقسيم القمر ','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,'تم دمج الثلاث مناطق ','2025-05-04 03:34:11','2025-08-06 16:09:22','721373d9-6c9f-407e-afe3-638f8b5e6dcc','8397232a-163d-4a09-8e0c-9fa339e76497','42fb7d1e-1dc7-47c3-b6b8-975d09f19664','22','[[[592762.2324999995, 2961383.5776999984], [592912.2125000004, 2961391.0917], [592927.7906999994, 2961271.6111], [592754.2365, 2961261.478], [592762.2324999995, 2961383.5776999984]], [[592708.6639999998, 2961482.9013000014], [592893.7631999997, 2961489.0638999995], [592900.6089, 2961402.7088999995], [592754.1660000002, 2961392.831], [592752.1511000004, 2961366.8667999995], [592699.4280999998, 2961369.4369], [592708.6639999998, 2961482.9013000014]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('9b372dd0-c0c6-497b-8c7b-3592ab39182a','65',2018,'decision-images/j82YSBOSfeFrINMg2J4xQC31MCSydlQo9SUXBpjb.pdf','c1ec4c22-b5a7-4901-94e6-72665d74dbcf','24225','23325.246728736','24225','3524','0','0','التقسيم الحضري ','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,'تم الاكتفاء بعدد 14 عمارة ويوجد مساحة شاغرة = 3524م2','2025-05-04 03:34:11','2025-08-06 16:02:24','83b33fa5-dce6-485f-b0ee-b3ad9f85ab12','8397232a-163d-4a09-8e0c-9fa339e76497','b8ddfa0d-91fd-461f-a7a6-28f96e95afb3','14','[[[689084.4337000006, 2773755.2698999993], [689232.8013000002, 2773757.6957999994], [689238.4325999997, 2773622.459099999], [689150.6227000003, 2773621.4559], [689149.6955000007, 2773575.0496], [689086.5587999996, 2773573.693199999], [689084.4337000006, 2773755.2698999993]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('a19237b5-9d95-4e6d-ac97-80d6c372a4f4','63',2020,'decision-images/tn2XZzbZyKqKmPwpENOVw6mg4R2OPjmEzqVCPG8Z.pdf','1fc39eec-c714-4712-973a-fbc93733e7bc','223512.65','226399.48176927','0','223512.65','0','108','أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي ','very_good','inprogress','8c82d771-63ae-4740-9ef8-b55a33b5821b',NULL,NULL,'لم تنفذ العمارات حتى الآن ','2025-05-04 03:34:11','2025-07-22 09:52:37','2e13f5e6-db0a-4917-af2f-cbe114ca966e','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','0','[[[568894.8467999992, 3022107.1544999997], [568964.3892000001, 3022203.853199998], [569038.3426, 3022150.4186], [568970.7224999999, 3022054.038], [568894.8467999992, 3022107.1544999997]], [[568841.5976000003, 3022292.0938], [568941.4879000005, 3022220.0335], [568834.3096000003, 3022071.1235999996], [568738.8840999997, 3022134.8542000004], [568841.5976000003, 3022292.0938]], [[568741.2440000001, 3022101.9907999993], [568917.5522, 3021978.3543999996], [568761.8609000004, 3021755.634099999], [568561.2202000004, 3021905.446], [568741.2440000001, 3022101.9907999993]], [[568400.6815999999, 3021713.0121], [568546.7115000004, 3021895.0575], [568750.6801000005, 3021739.8791], [568622.8376000004, 3021574.2891], [568400.6815999999, 3021713.0121]], [[568383.7646000005, 3021690.763999998], [568606.4284999997, 3021534.7635999992], [568458.9268000001, 3021320.0931999995], [568226.7471, 3021456.9662999995], [568383.7646000005, 3021690.763999998]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('a8b81ff9-507a-489e-9694-19abbc8bb84c','63',2020,'decision-images/a86N9eKzD4FlCPTsU9aSWryUQq57sNa9stxNo81N.pdf','1fc39eec-c714-4712-973a-fbc93733e7bc','132018.52','135995.58325966','11000','121018.52','0','46','شارع الحجاز تقسيم البداري','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,'تمت موافقة مجلس الإدارة ومجلس الوزراء على استكمال تنفيذ عدد 46 عمارة ','2025-05-04 03:34:11','2025-06-16 07:47:45','2620cf73-50b0-49e2-9f8f-1c3bb68a3e9a','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','18','[[[580297.2272999999, 3013561.4407999995], [579915.7889, 3013215.5752999997], [579819.6490999999, 3013357.2311000004], [579845.1014000009, 3013424.0996999997], [579842.9810000001, 3013587.7374999993], [580020.1236000004, 3013722.1534], [580080.5048000009, 3013646.1958999997], [580196.0027999997, 3013733.4082999993], [580297.2272999999, 3013561.4407999995]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('c7450ead-7746-4f32-a04f-7f4bd11df995','971',2023,'decision-images/7DUuBCmyoyNNh8HHgBnpev4VLw47TXFveTJuK8oz.pdf','1fc39eec-c714-4712-973a-fbc93733e7bc','297250','297897.44816427','0','0','0','0','شرق طريق الشرطة العسكرية ','good','inprogress','1a21e4dd-be52-4b40-b2d6-e73c17f28824',NULL,NULL,'لم تنفذ العمارات حتى الآن ','2025-05-04 03:34:11','2025-05-29 12:50:15','8cb7e1e6-0162-427b-be2d-12fede2aea08','8397232a-163d-4a09-8e0c-9fa339e76497','776efd16-c76e-4d71-a29b-c7dc7343bb2b','0','[[[508937.5935000002, 3134550.8051], [509597.5607999994, 3134551.014299999], [509597.38170000055, 3134100.5059], [508937.3891000005, 3134100.6045], [508937.5935000002, 3134550.8051]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('d37f766e-6d40-4626-b592-b3b53b0188bd','63',2020,'decision-images/aKZc9LEtBaCzDISri8bRpmghItCwOzxhKz5gynUP.pdf','1fc39eec-c714-4712-973a-fbc93733e7bc','615000','629244.31147038','568330','46670','0','24','تقسيم الحجاز منطقة أبوعشرة ','good','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3',NULL,NULL,'جاري العرض على مجلس الإدارة لتنفيذ العمارات المتبقية','2025-05-04 03:34:11','2025-08-06 15:33:40','8f7bd399-c11e-462c-aa8c-2ad7ec5ce065','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','300','[[[579988.2689, 3011487.969899999], [579757.7130000006, 3012349.5973], [579774.7020999995, 3012445.0951999994], [579832.9655999993, 3012495.3186000003], [580078.0766000001, 3012574.749], [580221.5068999999, 3012080.433899999], [580730.3438000005, 3012261.4273999985], [580759.8629000005, 3012121.3058000007], [580364.9221999993, 3012028.5818], [580420.7803999997, 3011710.8845], [580171.0343000008, 3011640.541], [580196.9349999997, 3011548.7047000006], [579988.2689, 3011487.969899999]], [[579403.5021999993, 3012039.0033000004], [579544.0902999997, 3011562.6544], [579462.8074000002, 3011540.9017], [579284.8234999999, 3012144.7095999983], [579688.6981999996, 3012431.3108], [579707.9531999996, 3012302.8137999997], [579830.9614999999, 3011880.976599999], [579718.7779000001, 3011849.2266], [579642.8423000001, 3012109.4447999997], [579403.5021999993, 3012039.0033000004]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19'),
('ef75af0e-d4f4-4cb1-bf5c-d8310069eb2c','25',2025,'decision-images/SBnTSheyUDaAhgwKT8t8KnFnNe8K32VaAVcwAKEI.xlsx','1fc39eec-c714-4712-973a-fbc93733e7bc','6354','54214','65','54','654','523','testtll','accept','inprogress','b7ff04c9-2447-4ab7-959b-80934f5a6fc3','8c82d771-63ae-4740-9ef8-b55a33b5821b',NULL,NULL,'2025-05-04 03:37:18','2025-08-06 16:00:52','2e13f5e6-db0a-4917-af2f-cbe114ca966e','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','524',NULL,'no',NULL),
('f1adfec5-664d-4b68-8e46-7b05a438c5f4','63',2020,'decision-images/TtneqM8YHDThn120EIpPXbIIsoOpG12sodzdy8Dx.pdf','1fc39eec-c714-4712-973a-fbc93733e7bc','131895.64','137029.98108395','0','131895.64','0','62','منطقة الأحياء بجوار بيتكو ','excellent','revision','94000ccb-1c41-432a-a716-8f1edfc98a19','8c82d771-63ae-4740-9ef8-b55a33b5821b',NULL,'لم تنفذ العمارات حتى الآن ','2025-05-04 03:34:11','2025-06-02 06:52:20','e768b283-ce53-40bc-a80d-c77331ce8191','8397232a-163d-4a09-8e0c-9fa339e76497','648152e0-33d1-47bb-b7f0-54d1428e1ec1','0','[[[574720.4207, 3018896.8962999997], [574559.346700001, 3018619.605900001], [574242.0389000006, 3018812.1655999995], [574440.9329000001, 3019155.2202999997], [574622.9824000001, 3019053.544599998], [574586.7776999995, 3018994.2469999995], [574720.4207, 3018896.8962999997]]]','no','94000ccb-1c41-432a-a716-8f1edfc98a19');
/*!40000 ALTER TABLE `origins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES
('04f6312a-0734-4a0d-ad7d-0de9d0b94063','view-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('08cdd5b2-a32b-49de-bd8d-4d75a3c1d782','bulk-delete-type-service','web','2025-08-17 12:10:59','2025-08-17 12:10:59'),
('08f7420b-fae6-4ece-84bf-a9326d862b78','delete-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('0987e76f-6178-4cb2-8d79-16c92c01cb25','bulk-delete-responsibility','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('17e92916-006c-4d8c-b9f6-90804747d431','edit-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('182fb9e0-5508-4d41-8b60-41fac0e6c7d3','delete-responsibility','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('1ea5d705-0757-4482-b98d-8d8c498f0bfe','view-permission','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('21e0fc15-9439-4eac-858a-6c321f390f13','edit-responsibility','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('224bb3db-b74f-4fdc-8864-74249a74011c','show-permission','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('267a3411-7ead-4c9c-8ca1-81dc2e2e586c','create-type-service','web','2025-08-17 12:12:11','2025-08-17 12:12:11'),
('26cdfc46-5e02-4d11-ba3e-5f0835a1c8ef','export-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('2707770e-0e52-41b9-a135-0796741d7ac7','view-profile','web','2025-04-28 15:26:26','2025-04-28 15:26:26'),
('280e9eeb-3a6d-4cbb-9255-5df23ff1a740','bulk-delete-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('2dbc243f-3038-4867-a069-303cd61308bd','view-chart-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('31b2a421-ee83-442c-a630-51e6c03d7489','view-role','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('35e3fdcc-424b-42bd-8da5-071c6cf8af62','delete-role','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('391a2a61-b0fa-47e3-92f4-dd22886853e4','edit-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('3995e847-0007-49ad-8051-bbe403c1b417','view-backup-database','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('3a727bfe-ed62-40e4-9253-c20ca033f4bb','export-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('3ab4a8f4-6c3b-41c0-9229-d3883e5840ba','force-delete-user','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('3bac4a12-0c1f-4ca0-987d-7134d6328838','view-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('3cf9933a-7679-4f48-8437-963943add2b0','view-chart-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('3f3c6a4c-66c7-458f-8761-af53746303c0','view-chart-user','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('415f4cb7-388b-4356-beac-50580edb539a','import-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('431e6781-6dff-46ce-9e5f-d1c02b624bb8','view-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('469c6b34-daae-4ea7-a972-0ebbc9b4da0a','edit-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('46f12d77-161f-45f8-953f-a6b93a0d3e44','export-user','web','2025-05-24 21:22:49','2025-05-24 21:22:49'),
('4bbb2d9a-59db-44b3-9cae-aa2fa3425627','edit-request-origin','web','2025-05-24 21:22:35','2025-05-24 21:22:35'),
('4d23b326-dc7f-4b1f-bb71-626744affe03','delete-user','web','2025-04-28 15:26:26','2025-04-28 15:26:26'),
('4e57c92d-e85f-4146-a959-528f45329155','view-trash-group-button','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('50eca05b-ad56-49ae-a9d7-a6489fb7b2c2','show-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('56157328-ba6d-41ae-a68c-df31bf2d824b','delete-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('59290e6c-62e1-4a59-8762-748136afdb43','add-coordinate-origin','web','2025-05-24 21:23:25','2025-05-24 21:23:25'),
('5d543831-1022-4fec-a846-610ce5399b74','import-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('60afc06b-c82e-40f5-9777-9a136d0293e6','create-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('616ff6bd-a3d0-4f87-8b4b-c31076f72124','export-type-service','web','2025-08-17 12:10:22','2025-08-17 12:10:22'),
('6211c7a2-1846-4f00-9fc9-82c7ce3887f7','delete-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('63348ed7-3eb3-4974-be01-a8c2ff6dbd4f','force-bulk-delete-user','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('645a9aef-e755-4fe4-aee6-418d5914e329','delete-job-title','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('669e8574-4aff-4ab1-aed2-466461355e2e','create-job-title','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('69fa479e-98e5-48f6-a93e-4f094388adee','delete-profile-account','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('6bd043f6-ce52-4f53-a0e1-b1f7cb97e114','bulk-delete-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('6ea400ee-1f83-44db-a7ab-a018502adc2a','bulk-delete-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('6ef0183a-1396-4bf1-a34f-282c1c454b88','view-edit-request-origin','web','2025-05-24 21:22:19','2025-05-24 21:22:19'),
('7038a145-c158-44d1-88e4-f4c3f70860d2','delete-permission','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('75b50edc-cdec-4125-aa87-191171895a98','export-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('77c6753e-b9ab-4795-86a0-b7e92db29d61','bulk-delete-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('7a1eba45-fed4-4f75-b3c0-a25e1bac85b7','import-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('7b21732b-4e24-479f-bd4a-d697386177c0','delete-type-service','web','2025-08-17 12:10:41','2025-08-17 12:10:41'),
('7fa78e02-cc8a-4614-b379-2d0a3663967e','view-responsibility','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('81a1e2a0-2c46-443b-a5cb-8ddd9cc596bf','bulk-delete-permission','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('823912fb-784d-4691-9ac1-e9f3114169fd','import-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('832e0f22-8746-4831-a4e8-34a6c03ec0ee','bulk-delete-user','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('84753a79-4800-4483-be30-1d91bd93bca3','edit-user','web','2025-04-28 15:26:26','2025-04-28 15:26:26'),
('85bdb2b7-5ce8-47f8-a5e0-58a155c28e03','edit-type-service','web','2025-08-17 12:11:56','2025-08-17 12:11:56'),
('89cb4008-54be-44a6-a544-0a82eec20ad3','create-permission','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('8c633ba1-dc63-4028-8662-d3da0ae338b4','edit-role','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('8d1d02e8-427b-4d0d-9495-a35ce09c0cd9','edit-permission','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('91b98a52-2142-406d-8110-58d71b016096','view-city','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('98db3e60-3564-45b6-8800-899563c88cbd','show-type-service','web','2025-08-17 12:12:26','2025-08-17 12:12:26'),
('9b331338-11e6-4f35-b621-e495b75c8760','edit-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('9b50bb70-0a0b-43bb-828b-bbb37b2c500f','delete-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('9c4b50a3-dc94-4b68-aef4-e5f8cd0579fe','view-job-title','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('9c5e67ff-20c3-41b0-9ebe-24cd61bcb005','view-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('9e35a11b-bd3e-414d-8945-e2ca5a22b014','import-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('9e7efa01-3a65-401e-af4a-6ccaa4a8ef92','bulk-delete-role','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('a0331da9-64ec-4e4e-8af3-c9b0db57b6b0','show-role','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('a6550ba4-a399-4bf2-877c-20465056787d','create-responsibility','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('a9c2b84a-8192-46e8-a46e-e81c6f1ffe4f','delete-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('ab897d63-b851-4ac5-882f-027f258064c2','create-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('ac85cc2d-a1da-48b6-8a2e-cda3fc931eca','create-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('b234360a-aecc-4e4d-902d-ab5b5b1ae592','view-chart-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('b452d184-3f93-4dd3-915a-9f3e55effb4d','view-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('b86282aa-49a1-4f28-a5ea-d48500aa6345','show-origin','web','2025-04-30 10:44:56','2025-04-30 10:44:56'),
('b89f1f1c-374a-4b44-a914-5bde86f39e57','edit-job-title','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('c1afa892-599f-4315-bf2a-ee33c433e620','view-user','web','2025-04-28 15:26:26','2025-04-28 15:26:26'),
('ce782f95-96e0-4faa-b98b-7e1b2ee8819b','create-role','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('ce855248-1158-48fa-b7a8-1bfe80a5f8ae','view-type-service','web','2025-08-17 12:11:15','2025-08-17 12:11:15'),
('cf371771-0a12-4ec5-96a7-3de689008f7a','logout-profile-sessions','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('d04144b7-6f63-4de8-94ce-ca79d7e8750b','bulk-delete-statement','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('d0c1226b-7f52-4b03-91bd-761ece2abf99','view-government','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('d6be14f9-d66f-489c-90b4-b9b73ee8aa2c','create-user','web','2025-04-28 15:26:26','2025-04-28 15:26:26'),
('dc3d141a-aafe-4591-8d26-d172fe5d8120','import-type-service','web','2025-08-17 12:10:07','2025-08-17 12:10:07'),
('dd76fb8a-0339-4262-86e5-c0d96a7896e9','restore-user','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('e33f0b77-6e6c-4499-8db1-18ec3f99aaa7','bulk-delete-job-title','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('e8e18147-1ae9-4588-a39e-ff632f4db935','create-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('f4fae84a-af39-4933-90a1-61262e48316a','export-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('f851d33f-5a8d-4a93-8e98-83680c74775c','show-user','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('f9f6ddd8-39bb-4fae-ac25-ea96b253c801','export-origin','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('fb4a2aaa-89fd-41a1-ad57-9fb72a795180','view-chart-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('fb832cb6-8a2a-4d77-9938-7e5c4a32107b','edit-department','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('fc42346f-6781-47cf-9015-a5848b519f58','create-decision-type','web','2025-04-28 15:26:27','2025-04-28 15:26:27'),
('ff3d73eb-58dc-46f6-921a-f4ed9dae096f','show-project','web','2025-04-28 15:26:27','2025-04-28 15:26:27');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fdc80e9d-0b4b-431b-bf04-bf20fd369f5a',
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES
('0099f4c5-b3c9-419a-9ec5-cb73b42f7fb7','مقر شالية بروتو السخنة نموذج A','2025-05-06 09:37:59','2025-05-06 09:37:59'),
('05b12ba5-a111-42f2-8a20-e5b0cff856ab','مقر شالية بورتو السخنة - نموذج B- خفرع','2025-05-06 09:38:54','2025-05-06 09:38:54'),
('11c9bce4-bda1-4dc3-bfe3-df93fad563c7','مقر شالية بورتو مارينا غرفتين وصالة','2025-05-06 09:37:22','2025-05-06 09:37:22'),
('2620cf73-50b0-49e2-9f8f-1c3bb68a3e9a','تنفيذ عدد 64 عمارة بشارع الحجاز تقسيم البداري – الغردقة','2025-05-04 02:10:51','2025-06-17 11:07:04'),
('2e13f5e6-db0a-4917-af2f-cbe114ca966e','تنفيذ عدد 108 عمارة أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي – الغردقة','2025-05-04 02:10:51','2025-05-04 02:10:51'),
('30d550ac-cf60-40c6-895a-8dbb7cfa2528','تنفيذ عدد 1200 وحدة تقسيم فلامنكو المنطقة الثانية – القصير','2025-05-04 02:10:51','2025-05-04 02:10:51'),
('44294172-144a-46d7-9eff-5bb89b99c899','تنفيذ عدد 22 عمارة تقسيم القمر - سفاجا ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('553484be-28ca-4097-9cac-3c210a3e4f18','تنفيذ عدد 85 عمارة منطقة غرب شارع الإذاعة - رأس غارب ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('5b61a48d-df8d-431c-9b26-6da06ded6061','تنفيذ عدد 19 عمارة تقسيم المركز السياحي – القصير','2025-05-04 02:10:51','2025-05-04 02:10:51'),
('5d2fdb65-6f23-4453-bb6a-61f035f44056','تنفيذ عدد 300 عمارة بمنطقة تقسيم الحجاز أبوعشرة - الغردقة ','2025-04-29 11:09:22','2025-04-29 11:09:22'),
('61455604-1ca5-4538-9f02-95468c2c85d3','تنفيذ عدد 1200 وحدة تقسيم فلامنكو المنطقة الثانية - القصير ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('62ed8511-6163-4ca6-94a6-d9eb1b1964bc','تنفيذ عدد 80 عمارة بشارع الحجاز تقسيم البداري - الغردقة ','2025-04-29 11:09:22','2025-04-29 11:09:22'),
('716e0bae-b7f4-4f7b-baa7-4d40c76d9ab0','تنفيذ عدد 500 عمارة بتقسيم الحجاز منطقة أبوعشرة الطريق الدائري الأوسط  - الغردقة ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('71c98ba6-5cf3-4553-9a36-d27fe6a8350b','مقر شالية بورتو السخنة - نموذج A - منقرع','2025-05-06 09:38:42','2025-05-06 09:38:42'),
('721373d9-6c9f-407e-afe3-638f8b5e6dcc','تنفيذ عدد 22 عمارة تقسيم القمر – سفاجا','2025-05-04 02:10:51','2025-05-04 02:10:51'),
('83b33fa5-dce6-485f-b0ee-b3ad9f85ab12','تنفيذ عدد 14 عمارة التقسيم الحضري - مرسى علم ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('83ce4a2a-cb44-4763-9d74-9b220a285c16','تنفيذ عدد 50 عمارة سيف هيكل - الغردقة ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('8cb7e1e6-0162-427b-be2d-12fede2aea08','تنفيذ عدد 280 عمارة شرق طريق الشرطة العسكرية - رأس غارب ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('8f7bd399-c11e-462c-aa8c-2ad7ec5ce065','تنفيذ عدد 300 عمارة بمنطقة تقسيم الحجاز أبوعشرة – الغردقة','2025-05-04 02:10:51','2025-05-04 02:10:51'),
('98f4004a-0c62-4daf-a2e7-bc37bca85658','تنفيذ عدد 126 عمارة تقسيم شمال الأحياء – الغردقة','2025-05-04 02:10:51','2025-05-04 02:10:51'),
('99ef8548-bf04-4fa5-bb68-51ab3947e984','تنفيذ عدد 19 عمارة تقسيم المركز السياحي - القصير  ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('b81c433c-94fd-421f-8a68-0cd152187eea','تنفيذ عدد 126 عمارة تقسيم شمال الأحياء - الغردقة  ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('ca0a1f94-c970-4fbd-8514-c8f3e681a901','تنفيذ عدد 50 عمارة سيف هيكل – الغردقة','2025-05-04 02:10:51','2025-05-04 02:10:51'),
('d5789031-9704-4f5a-9928-b13491d9dbe5','مقر شالية مارينا 1','2025-05-06 09:37:07','2025-05-06 09:37:07'),
('db4ad9ea-a154-468a-a448-da91411e6956','مقر شالية بروتو مارينا 3 غرف وصالة','2025-05-06 09:37:40','2025-05-06 09:37:40'),
('e768b283-ce53-40bc-a80d-c77331ce8191','تنفيذ عدد 62 عمارة بمنطقة الأحياء بجوار شركة بيتكو - الغردقة ','2025-04-29 11:09:22','2025-04-29 11:09:22'),
('f03430e9-947b-46e2-bb6f-3bf1cb8ea534','تنفيذ عدد 108 عمارة أمام الحرس الجمهوري بطريق الجونة بالظهير السياحي - الغردقة ','2025-04-29 11:09:22','2025-04-29 11:09:22');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsibilities`
--

DROP TABLE IF EXISTS `responsibilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `responsibilities` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `responsibilities_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsibilities`
--

LOCK TABLES `responsibilities` WRITE;
/*!40000 ALTER TABLE `responsibilities` DISABLE KEYS */;
INSERT INTO `responsibilities` VALUES
('2457e895-0419-446e-b2cc-be4d02ea30af','المديونيات','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('3de54b0b-862e-4c07-856a-31b6e4d0d535','التحصيل','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('48730245-efcd-42e0-a8e2-7e04de77b4b2','الشئون القانونية','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('4ed5c430-758f-426e-b562-0b95802db272','العقود','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('68489d39-0dcc-4008-b665-ad1fccde387f','بيانات الملكية','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('7b824021-4c4f-4446-bed0-84ce15f87c79','التعديات','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('bada2f77-fa0f-4de2-889d-0ff7117ffb5d','البعد المكاني','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('c0f46ea3-90fa-44d2-9178-eab36f8617dc','التقيم و التسعير','2025-04-28 15:26:28','2025-04-28 15:26:28'),
('d8617035-320a-4c13-93cd-d3206d582182','مشاهدة','2025-05-28 11:49:14','2025-05-28 11:49:14'),
('e3f01ed3-1249-46bc-864a-71a9d761e799','رئيس فريق العمل','2025-04-28 15:26:28','2025-04-28 15:26:28');
/*!40000 ALTER TABLE `responsibilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsibility_user`
--

DROP TABLE IF EXISTS `responsibility_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `responsibility_user` (
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`responsibility_id`),
  KEY `responsibility_user_responsibility_id_foreign` (`responsibility_id`),
  CONSTRAINT `responsibility_user_responsibility_id_foreign` FOREIGN KEY (`responsibility_id`) REFERENCES `responsibilities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `responsibility_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsibility_user`
--

LOCK TABLES `responsibility_user` WRITE;
/*!40000 ALTER TABLE `responsibility_user` DISABLE KEYS */;
INSERT INTO `responsibility_user` VALUES
('1a21e4dd-be52-4b40-b2d6-e73c17f28824','48730245-efcd-42e0-a8e2-7e04de77b4b2','2025-04-29 11:00:36','2025-04-29 11:00:36'),
('1a21e4dd-be52-4b40-b2d6-e73c17f28824','68489d39-0dcc-4008-b665-ad1fccde387f','2025-04-29 11:00:36','2025-04-29 11:00:36'),
('1a21e4dd-be52-4b40-b2d6-e73c17f28824','7b824021-4c4f-4446-bed0-84ce15f87c79','2025-04-29 11:00:35','2025-04-29 11:00:35'),
('507e4996-9cd3-4732-8a24-a22b6035f03b','2457e895-0419-446e-b2cc-be4d02ea30af','2025-04-29 11:01:36','2025-04-29 11:01:36'),
('507e4996-9cd3-4732-8a24-a22b6035f03b','3de54b0b-862e-4c07-856a-31b6e4d0d535','2025-04-29 11:01:36','2025-04-29 11:01:36'),
('507e4996-9cd3-4732-8a24-a22b6035f03b','4ed5c430-758f-426e-b562-0b95802db272','2025-04-29 11:01:36','2025-04-29 11:01:36'),
('6f99322f-79bc-4cf4-86fb-2dd2330556a7','d8617035-320a-4c13-93cd-d3206d582182','2025-05-28 11:50:05','2025-05-28 11:50:05'),
('8477fe7e-9650-4e45-bc88-d9542d71cc53','48730245-efcd-42e0-a8e2-7e04de77b4b2','2025-04-29 10:59:59','2025-04-29 10:59:59'),
('8477fe7e-9650-4e45-bc88-d9542d71cc53','68489d39-0dcc-4008-b665-ad1fccde387f','2025-04-29 10:59:59','2025-04-29 10:59:59'),
('8477fe7e-9650-4e45-bc88-d9542d71cc53','7b824021-4c4f-4446-bed0-84ce15f87c79','2025-04-29 10:59:59','2025-04-29 10:59:59'),
('94000ccb-1c41-432a-a716-8f1edfc98a19','bada2f77-fa0f-4de2-889d-0ff7117ffb5d','2025-04-29 11:02:07','2025-04-29 11:02:07'),
('94000ccb-1c41-432a-a716-8f1edfc98a19','c0f46ea3-90fa-44d2-9178-eab36f8617dc','2025-04-29 11:02:08','2025-04-29 11:02:08'),
('b487eaf4-1582-4966-aace-bfa3a3a272d1','bada2f77-fa0f-4de2-889d-0ff7117ffb5d','2025-04-29 10:50:48','2025-04-29 10:50:48'),
('b487eaf4-1582-4966-aace-bfa3a3a272d1','c0f46ea3-90fa-44d2-9178-eab36f8617dc','2025-04-29 10:50:48','2025-04-29 10:50:48'),
('b7ff04c9-2447-4ab7-959b-80934f5a6fc3','2457e895-0419-446e-b2cc-be4d02ea30af','2025-04-29 11:02:51','2025-04-29 11:02:51'),
('b7ff04c9-2447-4ab7-959b-80934f5a6fc3','4ed5c430-758f-426e-b562-0b95802db272','2025-04-29 11:02:51','2025-04-29 11:02:51'),
('e28df551-c71f-4c6e-8d4f-27c75d870afa','e3f01ed3-1249-46bc-864a-71a9d761e799','2025-04-29 10:42:06','2025-04-29 10:42:06');
/*!40000 ALTER TABLE `responsibility_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES
('04f6312a-0734-4a0d-ad7d-0de9d0b94063','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('17e92916-006c-4d8c-b9f6-90804747d431','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('267a3411-7ead-4c9c-8ca1-81dc2e2e586c','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('2dbc243f-3038-4867-a069-303cd61308bd','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('391a2a61-b0fa-47e3-92f4-dd22886853e4','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('3a727bfe-ed62-40e4-9253-c20ca033f4bb','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('3bac4a12-0c1f-4ca0-987d-7134d6328838','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('3cf9933a-7679-4f48-8437-963943add2b0','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('3f3c6a4c-66c7-458f-8761-af53746303c0','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('431e6781-6dff-46ce-9e5f-d1c02b624bb8','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('469c6b34-daae-4ea7-a972-0ebbc9b4da0a','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('4bbb2d9a-59db-44b3-9cae-aa2fa3425627','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('5d543831-1022-4fec-a846-610ce5399b74','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('616ff6bd-a3d0-4f87-8b4b-c31076f72124','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('75b50edc-cdec-4125-aa87-191171895a98','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('85bdb2b7-5ce8-47f8-a5e0-58a155c28e03','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('91b98a52-2142-406d-8110-58d71b016096','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('98db3e60-3564-45b6-8800-899563c88cbd','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('9b331338-11e6-4f35-b621-e495b75c8760','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('ab897d63-b851-4ac5-882f-027f258064c2','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('ac85cc2d-a1da-48b6-8a2e-cda3fc931eca','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('b234360a-aecc-4e4d-902d-ab5b5b1ae592','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('b452d184-3f93-4dd3-915a-9f3e55effb4d','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('b86282aa-49a1-4f28-a5ea-d48500aa6345','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('ce855248-1158-48fa-b7a8-1bfe80a5f8ae','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('d0c1226b-7f52-4b03-91bd-761ece2abf99','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('e8e18147-1ae9-4588-a39e-ff632f4db935','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('f4fae84a-af39-4933-90a1-61262e48316a','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('f9f6ddd8-39bb-4fae-ac25-ea96b253c801','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('fb4a2aaa-89fd-41a1-ad57-9fb72a795180','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('fc42346f-6781-47cf-9015-a5848b519f58','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('ff3d73eb-58dc-46f6-921a-f4ed9dae096f','6d6cdaac-23c0-4635-b41a-01fb0d8fa175'),
('59290e6c-62e1-4a59-8762-748136afdb43','7ac67971-f0c4-4142-9038-476b1f3a3088'),
('04f6312a-0734-4a0d-ad7d-0de9d0b94063','852e3803-d5f3-4086-8460-359d2829a0f8'),
('17e92916-006c-4d8c-b9f6-90804747d431','852e3803-d5f3-4086-8460-359d2829a0f8'),
('224bb3db-b74f-4fdc-8864-74249a74011c','852e3803-d5f3-4086-8460-359d2829a0f8'),
('267a3411-7ead-4c9c-8ca1-81dc2e2e586c','852e3803-d5f3-4086-8460-359d2829a0f8'),
('2dbc243f-3038-4867-a069-303cd61308bd','852e3803-d5f3-4086-8460-359d2829a0f8'),
('391a2a61-b0fa-47e3-92f4-dd22886853e4','852e3803-d5f3-4086-8460-359d2829a0f8'),
('3a727bfe-ed62-40e4-9253-c20ca033f4bb','852e3803-d5f3-4086-8460-359d2829a0f8'),
('3bac4a12-0c1f-4ca0-987d-7134d6328838','852e3803-d5f3-4086-8460-359d2829a0f8'),
('3cf9933a-7679-4f48-8437-963943add2b0','852e3803-d5f3-4086-8460-359d2829a0f8'),
('3f3c6a4c-66c7-458f-8761-af53746303c0','852e3803-d5f3-4086-8460-359d2829a0f8'),
('415f4cb7-388b-4356-beac-50580edb539a','852e3803-d5f3-4086-8460-359d2829a0f8'),
('431e6781-6dff-46ce-9e5f-d1c02b624bb8','852e3803-d5f3-4086-8460-359d2829a0f8'),
('4bbb2d9a-59db-44b3-9cae-aa2fa3425627','852e3803-d5f3-4086-8460-359d2829a0f8'),
('5d543831-1022-4fec-a846-610ce5399b74','852e3803-d5f3-4086-8460-359d2829a0f8'),
('616ff6bd-a3d0-4f87-8b4b-c31076f72124','852e3803-d5f3-4086-8460-359d2829a0f8'),
('75b50edc-cdec-4125-aa87-191171895a98','852e3803-d5f3-4086-8460-359d2829a0f8'),
('823912fb-784d-4691-9ac1-e9f3114169fd','852e3803-d5f3-4086-8460-359d2829a0f8'),
('91b98a52-2142-406d-8110-58d71b016096','852e3803-d5f3-4086-8460-359d2829a0f8'),
('9b331338-11e6-4f35-b621-e495b75c8760','852e3803-d5f3-4086-8460-359d2829a0f8'),
('9c4b50a3-dc94-4b68-aef4-e5f8cd0579fe','852e3803-d5f3-4086-8460-359d2829a0f8'),
('9e35a11b-bd3e-414d-8945-e2ca5a22b014','852e3803-d5f3-4086-8460-359d2829a0f8'),
('ab897d63-b851-4ac5-882f-027f258064c2','852e3803-d5f3-4086-8460-359d2829a0f8'),
('ac85cc2d-a1da-48b6-8a2e-cda3fc931eca','852e3803-d5f3-4086-8460-359d2829a0f8'),
('b234360a-aecc-4e4d-902d-ab5b5b1ae592','852e3803-d5f3-4086-8460-359d2829a0f8'),
('b452d184-3f93-4dd3-915a-9f3e55effb4d','852e3803-d5f3-4086-8460-359d2829a0f8'),
('b86282aa-49a1-4f28-a5ea-d48500aa6345','852e3803-d5f3-4086-8460-359d2829a0f8'),
('ce855248-1158-48fa-b7a8-1bfe80a5f8ae','852e3803-d5f3-4086-8460-359d2829a0f8'),
('d0c1226b-7f52-4b03-91bd-761ece2abf99','852e3803-d5f3-4086-8460-359d2829a0f8'),
('dc3d141a-aafe-4591-8d26-d172fe5d8120','852e3803-d5f3-4086-8460-359d2829a0f8'),
('e8e18147-1ae9-4588-a39e-ff632f4db935','852e3803-d5f3-4086-8460-359d2829a0f8'),
('f4fae84a-af39-4933-90a1-61262e48316a','852e3803-d5f3-4086-8460-359d2829a0f8'),
('f9f6ddd8-39bb-4fae-ac25-ea96b253c801','852e3803-d5f3-4086-8460-359d2829a0f8'),
('fb4a2aaa-89fd-41a1-ad57-9fb72a795180','852e3803-d5f3-4086-8460-359d2829a0f8'),
('fc42346f-6781-47cf-9015-a5848b519f58','852e3803-d5f3-4086-8460-359d2829a0f8'),
('ff3d73eb-58dc-46f6-921a-f4ed9dae096f','852e3803-d5f3-4086-8460-359d2829a0f8'),
('04f6312a-0734-4a0d-ad7d-0de9d0b94063','9129a810-fc4a-476d-923f-efeaa598a999'),
('1ea5d705-0757-4482-b98d-8d8c498f0bfe','9129a810-fc4a-476d-923f-efeaa598a999'),
('224bb3db-b74f-4fdc-8864-74249a74011c','9129a810-fc4a-476d-923f-efeaa598a999'),
('26cdfc46-5e02-4d11-ba3e-5f0835a1c8ef','9129a810-fc4a-476d-923f-efeaa598a999'),
('2707770e-0e52-41b9-a135-0796741d7ac7','9129a810-fc4a-476d-923f-efeaa598a999'),
('2dbc243f-3038-4867-a069-303cd61308bd','9129a810-fc4a-476d-923f-efeaa598a999'),
('31b2a421-ee83-442c-a630-51e6c03d7489','9129a810-fc4a-476d-923f-efeaa598a999'),
('3a727bfe-ed62-40e4-9253-c20ca033f4bb','9129a810-fc4a-476d-923f-efeaa598a999'),
('3bac4a12-0c1f-4ca0-987d-7134d6328838','9129a810-fc4a-476d-923f-efeaa598a999'),
('3cf9933a-7679-4f48-8437-963943add2b0','9129a810-fc4a-476d-923f-efeaa598a999'),
('3f3c6a4c-66c7-458f-8761-af53746303c0','9129a810-fc4a-476d-923f-efeaa598a999'),
('431e6781-6dff-46ce-9e5f-d1c02b624bb8','9129a810-fc4a-476d-923f-efeaa598a999'),
('46f12d77-161f-45f8-953f-a6b93a0d3e44','9129a810-fc4a-476d-923f-efeaa598a999'),
('4e57c92d-e85f-4146-a959-528f45329155','9129a810-fc4a-476d-923f-efeaa598a999'),
('50eca05b-ad56-49ae-a9d7-a6489fb7b2c2','9129a810-fc4a-476d-923f-efeaa598a999'),
('6ef0183a-1396-4bf1-a34f-282c1c454b88','9129a810-fc4a-476d-923f-efeaa598a999'),
('75b50edc-cdec-4125-aa87-191171895a98','9129a810-fc4a-476d-923f-efeaa598a999'),
('7fa78e02-cc8a-4614-b379-2d0a3663967e','9129a810-fc4a-476d-923f-efeaa598a999'),
('91b98a52-2142-406d-8110-58d71b016096','9129a810-fc4a-476d-923f-efeaa598a999'),
('9c4b50a3-dc94-4b68-aef4-e5f8cd0579fe','9129a810-fc4a-476d-923f-efeaa598a999'),
('9c5e67ff-20c3-41b0-9ebe-24cd61bcb005','9129a810-fc4a-476d-923f-efeaa598a999'),
('a0331da9-64ec-4e4e-8af3-c9b0db57b6b0','9129a810-fc4a-476d-923f-efeaa598a999'),
('b234360a-aecc-4e4d-902d-ab5b5b1ae592','9129a810-fc4a-476d-923f-efeaa598a999'),
('b452d184-3f93-4dd3-915a-9f3e55effb4d','9129a810-fc4a-476d-923f-efeaa598a999'),
('b86282aa-49a1-4f28-a5ea-d48500aa6345','9129a810-fc4a-476d-923f-efeaa598a999'),
('c1afa892-599f-4315-bf2a-ee33c433e620','9129a810-fc4a-476d-923f-efeaa598a999'),
('ce855248-1158-48fa-b7a8-1bfe80a5f8ae','9129a810-fc4a-476d-923f-efeaa598a999'),
('d0c1226b-7f52-4b03-91bd-761ece2abf99','9129a810-fc4a-476d-923f-efeaa598a999'),
('f4fae84a-af39-4933-90a1-61262e48316a','9129a810-fc4a-476d-923f-efeaa598a999'),
('f851d33f-5a8d-4a93-8e98-83680c74775c','9129a810-fc4a-476d-923f-efeaa598a999'),
('f9f6ddd8-39bb-4fae-ac25-ea96b253c801','9129a810-fc4a-476d-923f-efeaa598a999'),
('fb4a2aaa-89fd-41a1-ad57-9fb72a795180','9129a810-fc4a-476d-923f-efeaa598a999'),
('ff3d73eb-58dc-46f6-921a-f4ed9dae096f','9129a810-fc4a-476d-923f-efeaa598a999'),
('04f6312a-0734-4a0d-ad7d-0de9d0b94063','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('08cdd5b2-a32b-49de-bd8d-4d75a3c1d782','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('08f7420b-fae6-4ece-84bf-a9326d862b78','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('0987e76f-6178-4cb2-8d79-16c92c01cb25','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('17e92916-006c-4d8c-b9f6-90804747d431','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('182fb9e0-5508-4d41-8b60-41fac0e6c7d3','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('1ea5d705-0757-4482-b98d-8d8c498f0bfe','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('21e0fc15-9439-4eac-858a-6c321f390f13','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('224bb3db-b74f-4fdc-8864-74249a74011c','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('267a3411-7ead-4c9c-8ca1-81dc2e2e586c','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('26cdfc46-5e02-4d11-ba3e-5f0835a1c8ef','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('2707770e-0e52-41b9-a135-0796741d7ac7','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('280e9eeb-3a6d-4cbb-9255-5df23ff1a740','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('2dbc243f-3038-4867-a069-303cd61308bd','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('31b2a421-ee83-442c-a630-51e6c03d7489','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('35e3fdcc-424b-42bd-8da5-071c6cf8af62','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('391a2a61-b0fa-47e3-92f4-dd22886853e4','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('3995e847-0007-49ad-8051-bbe403c1b417','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('3a727bfe-ed62-40e4-9253-c20ca033f4bb','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('3ab4a8f4-6c3b-41c0-9229-d3883e5840ba','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('3bac4a12-0c1f-4ca0-987d-7134d6328838','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('3cf9933a-7679-4f48-8437-963943add2b0','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('3f3c6a4c-66c7-458f-8761-af53746303c0','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('415f4cb7-388b-4356-beac-50580edb539a','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('431e6781-6dff-46ce-9e5f-d1c02b624bb8','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('469c6b34-daae-4ea7-a972-0ebbc9b4da0a','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('46f12d77-161f-45f8-953f-a6b93a0d3e44','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('4bbb2d9a-59db-44b3-9cae-aa2fa3425627','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('4d23b326-dc7f-4b1f-bb71-626744affe03','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('4e57c92d-e85f-4146-a959-528f45329155','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('50eca05b-ad56-49ae-a9d7-a6489fb7b2c2','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('56157328-ba6d-41ae-a68c-df31bf2d824b','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('59290e6c-62e1-4a59-8762-748136afdb43','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('5d543831-1022-4fec-a846-610ce5399b74','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('60afc06b-c82e-40f5-9777-9a136d0293e6','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('616ff6bd-a3d0-4f87-8b4b-c31076f72124','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('6211c7a2-1846-4f00-9fc9-82c7ce3887f7','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('63348ed7-3eb3-4974-be01-a8c2ff6dbd4f','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('645a9aef-e755-4fe4-aee6-418d5914e329','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('669e8574-4aff-4ab1-aed2-466461355e2e','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('69fa479e-98e5-48f6-a93e-4f094388adee','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('6bd043f6-ce52-4f53-a0e1-b1f7cb97e114','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('6ea400ee-1f83-44db-a7ab-a018502adc2a','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('6ef0183a-1396-4bf1-a34f-282c1c454b88','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('7038a145-c158-44d1-88e4-f4c3f70860d2','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('75b50edc-cdec-4125-aa87-191171895a98','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('77c6753e-b9ab-4795-86a0-b7e92db29d61','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('7a1eba45-fed4-4f75-b3c0-a25e1bac85b7','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('7b21732b-4e24-479f-bd4a-d697386177c0','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('7fa78e02-cc8a-4614-b379-2d0a3663967e','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('81a1e2a0-2c46-443b-a5cb-8ddd9cc596bf','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('823912fb-784d-4691-9ac1-e9f3114169fd','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('832e0f22-8746-4831-a4e8-34a6c03ec0ee','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('84753a79-4800-4483-be30-1d91bd93bca3','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('85bdb2b7-5ce8-47f8-a5e0-58a155c28e03','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('89cb4008-54be-44a6-a544-0a82eec20ad3','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('8c633ba1-dc63-4028-8662-d3da0ae338b4','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('8d1d02e8-427b-4d0d-9495-a35ce09c0cd9','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('91b98a52-2142-406d-8110-58d71b016096','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('98db3e60-3564-45b6-8800-899563c88cbd','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('9b331338-11e6-4f35-b621-e495b75c8760','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('9b50bb70-0a0b-43bb-828b-bbb37b2c500f','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('9c4b50a3-dc94-4b68-aef4-e5f8cd0579fe','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('9c5e67ff-20c3-41b0-9ebe-24cd61bcb005','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('9e35a11b-bd3e-414d-8945-e2ca5a22b014','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('9e7efa01-3a65-401e-af4a-6ccaa4a8ef92','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('a0331da9-64ec-4e4e-8af3-c9b0db57b6b0','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('a6550ba4-a399-4bf2-877c-20465056787d','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('a9c2b84a-8192-46e8-a46e-e81c6f1ffe4f','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('ab897d63-b851-4ac5-882f-027f258064c2','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('ac85cc2d-a1da-48b6-8a2e-cda3fc931eca','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('b234360a-aecc-4e4d-902d-ab5b5b1ae592','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('b452d184-3f93-4dd3-915a-9f3e55effb4d','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('b86282aa-49a1-4f28-a5ea-d48500aa6345','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('b89f1f1c-374a-4b44-a914-5bde86f39e57','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('c1afa892-599f-4315-bf2a-ee33c433e620','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('ce782f95-96e0-4faa-b98b-7e1b2ee8819b','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('ce855248-1158-48fa-b7a8-1bfe80a5f8ae','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('cf371771-0a12-4ec5-96a7-3de689008f7a','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('d04144b7-6f63-4de8-94ce-ca79d7e8750b','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('d0c1226b-7f52-4b03-91bd-761ece2abf99','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('d6be14f9-d66f-489c-90b4-b9b73ee8aa2c','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('dc3d141a-aafe-4591-8d26-d172fe5d8120','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('dd76fb8a-0339-4262-86e5-c0d96a7896e9','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('e33f0b77-6e6c-4499-8db1-18ec3f99aaa7','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('e8e18147-1ae9-4588-a39e-ff632f4db935','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('f4fae84a-af39-4933-90a1-61262e48316a','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('f851d33f-5a8d-4a93-8e98-83680c74775c','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('f9f6ddd8-39bb-4fae-ac25-ea96b253c801','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('fb4a2aaa-89fd-41a1-ad57-9fb72a795180','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('fb832cb6-8a2a-4d77-9938-7e5c4a32107b','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('fc42346f-6781-47cf-9015-a5848b519f58','a7607302-8f22-4396-b9d4-7795a118bfb4'),
('ff3d73eb-58dc-46f6-921a-f4ed9dae096f','a7607302-8f22-4396-b9d4-7795a118bfb4');
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
('6d6cdaac-23c0-4635-b41a-01fb0d8fa175','Revision','web','2025-04-28 15:26:28','2025-04-29 10:50:03'),
('7ac67971-f0c4-4142-9038-476b1f3a3088','Coordinate','web','2025-05-24 21:28:02','2025-05-24 21:28:02'),
('852e3803-d5f3-4086-8460-359d2829a0f8','DataEntry','web','2025-04-28 15:26:28','2025-04-29 10:44:42'),
('9129a810-fc4a-476d-923f-efeaa598a999','Viewer','web','2025-05-28 11:44:44','2025-05-28 11:45:11'),
('a7607302-8f22-4396-b9d4-7795a118bfb4','Super Admin','web','2025-04-28 15:26:28','2025-04-28 15:26:28');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '8ab79006-c8b3-47e0-a95d-f16be4fc27dd',
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statements`
--

DROP TABLE IF EXISTS `statements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `statements` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `statements_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statements`
--

LOCK TABLES `statements` WRITE;
/*!40000 ALTER TABLE `statements` DISABLE KEYS */;
INSERT INTO `statements` VALUES
('114e446a-71c7-4e79-a6d5-0ddf770b7a8d','الجهاز المركزي للتعمير - جهاز تعمير البحر الأحمر  ','2025-04-29 11:09:23','2025-06-16 07:37:08'),
('5cc76d6c-a2ba-4209-81b6-063e0b5c52f0','مديرية الإسكان والمرافق بمحافظة البحر الأحمر ','2025-04-29 11:09:22','2025-04-29 11:09:22'),
('b95742fc-80c0-44d7-897c-88e52d11fc23','منحة إماراتية ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('bae76f11-3713-4690-b9e7-5cfd27d252f8','الجهاز المركزي للتعمير ','2025-04-29 11:09:23','2025-04-29 11:09:23'),
('d13e1541-82c3-4f97-b5ad-4acc423dd119','لا يوجد','2025-05-04 11:39:40','2025-05-04 11:39:40');
/*!40000 ALTER TABLE `statements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_services`
--

DROP TABLE IF EXISTS `type_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_services` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_services_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_services`
--

LOCK TABLES `type_services` WRITE;
/*!40000 ALTER TABLE `type_services` DISABLE KEYS */;
INSERT INTO `type_services` VALUES
('57204723-827c-4b46-894e-24bd41913e43','محلات','2025-08-17 12:18:05','2025-08-17 12:18:05'),
('d6e60b85-a4ce-4c13-ab60-67e7a21947ae','مخابز','2025-08-17 12:18:13','2025-08-17 12:18:13');
/*!40000 ALTER TABLE `type_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_national_number_phone_number_unique` (`email`,`national_number`,`phone_number`),
  KEY `users_department_id_foreign` (`department_id`),
  KEY `users_job_title_id_foreign` (`job_title_id`),
  CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_job_title_id_foreign` FOREIGN KEY (`job_title_id`) REFERENCES `job_titles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
('1a21e4dd-be52-4b40-b2d6-e73c17f28824','مارى عادل','maryadel@gmail.com','29305302101625','01007429191',NULL,'$2y$10$dQXxLYCN52BCho9OneJG5.ZDAqfJKRVzyECDFuCSy6YCO5aebPyYG',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-05-28 10:40:17','40dd2d94-04ee-487d-8dad-ed3b21245d6a','c969eed4-c2f2-4b5e-a831-d4e6208c5f84'),
('507e4996-9cd3-4732-8a24-a22b6035f03b','احمد عاطف','ahmedatef@gmail.com','29203240103611','01225781732',NULL,'$2y$10$crr4b2G1EbYA/uGeR2PMxOy4IYuthNHrN2qPGrbFxTkravt9/IG0a',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-05-24 21:32:40','72bd59f9-a04e-414d-b668-c83fc9ab2b57','c969eed4-c2f2-4b5e-a831-d4e6208c5f84'),
('6f99322f-79bc-4cf4-86fb-2dd2330556a7','view','view@gmail.com','25323233632569','01122335656',NULL,'$2y$10$VmHgltKgv82NcaF32TOSHuvPNWPUVCWpYHi.yhYZjEpE2H0PUvab6',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-05-28 11:50:04','2025-05-28 11:50:04','d0212885-f294-43c8-9585-ac2f87861755','93569d07-a617-445b-8b76-1530a8504be4'),
('8477fe7e-9650-4e45-bc88-d9542d71cc53','رامى عبد الصادق','ramyabdelsadek@gmail.com','28508030300059','01007755011',NULL,'$2y$10$sTzfocrSe0cNC/q5L9lY6eqZVXj2XfXORSn6x.bZquDOXtGk7v2Hu',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-05-24 21:30:57','40dd2d94-04ee-487d-8dad-ed3b21245d6a','6da764d9-bf25-44df-af15-130d21f9024d'),
('8c82d771-63ae-4740-9ef8-b55a33b5821b','SuperAdmin','mesmat@mff.gov.eg','29606011210931','01153447675',NULL,'$2y$10$yyzQrovOlFLkl0GdbcgHPuMwF.z5S4QF6u7dXf/WZIhoZ.DkJqfsy',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-06-02 10:57:15','cc52af45-46e9-409a-91f4-396a63bfecd4','5344a9c7-804b-490b-a650-fe3bc5fa7aab'),
('94000ccb-1c41-432a-a716-8f1edfc98a19','عماد كمال','emadkamal@gmail.com','29006012606611','01012265196',NULL,'$2y$10$57.TDEaQw1Kw14VLuhFZ.O4mBdmXvRF3g3UBvFcws5hP0/UqPR/vK',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-05-24 21:30:06','214f9847-9362-489b-9c60-3aa3ebac79a9','c969eed4-c2f2-4b5e-a831-d4e6208c5f84'),
('b487eaf4-1582-4966-aace-bfa3a3a272d1','عاطف احمد','atefahmed@gmail.com','26712201204419','01061295796',NULL,'$2y$10$BPq9EPu3G1TQ5zyGiliYOe2j3zTe5Gk7PDFcmJwxUcA32s0qzg8U2',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-05-24 21:29:46','214f9847-9362-489b-9c60-3aa3ebac79a9','6da764d9-bf25-44df-af15-130d21f9024d'),
('b7ff04c9-2447-4ab7-959b-80934f5a6fc3','عبد الحميد محمد','abdelhamed-m@mff.gov.eg','28501012702471','01008715259',NULL,'$2y$10$87p4GzesKEeipMCZasEPOOrhoFaNt8757a.9av3h5MBNARGuLpZLG',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-06-24 08:39:31','72bd59f9-a04e-414d-b668-c83fc9ab2b57','6da764d9-bf25-44df-af15-130d21f9024d'),
('e28df551-c71f-4c6e-8d4f-27c75d870afa','صابر إمام حسن','semam@mff.gov.eg','27305200101798','01005015476',NULL,'$2y$10$yfHDCjs.3Ysj7edhTjBU7.B1S1x103rbG8vM0LgX2BM7GXT1XUkdu',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2025-04-28 15:26:29','2025-06-02 10:56:41','cc52af45-46e9-409a-91f4-396a63bfecd4','5344a9c7-804b-490b-a650-fe3bc5fa7aab');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-17 12:18:55
