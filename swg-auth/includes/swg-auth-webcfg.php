<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Is the webcfg action requested?
if ( isset( $_GET['action'] ) && $_GET['action'] === 'swg-auth-webcfg' ) {
  // Begin Outputting CFG
?>
[BestineEvents]
MuseumEventDuration=<?php echo get_option( 'swg-auth-MuseumEventDuration', '1209600' ) . PHP_EOL; ?>
PoliticianEventDuration=<?php echo get_option( 'swg-auth-PoliticianEventDuration', '2592000' ) . PHP_EOL; ?>

[CentralServer]
<?php echo get_option( 'swg-auth-enable-corellia', 'on' ) === 'on' ? 'startPlanet=corellia' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-dantooine', 'on' ) === 'on' ? 'startPlanet=dantooine' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-dathomir', 'on' ) === 'on' ? 'startPlanet=dathomir' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-endor', 'on' ) === 'on' ? 'startPlanet=endor' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-lok', 'on' ) === 'on' ? 'startPlanet=lok' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-kashyyyk-dead-forest', 'on' ) === 'on' ? 'startPlanet=kashyyyk_dead_forest' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-kashyyyk-hunting', 'on' ) === 'on' ? 'startPlanet=kashyyyk_hunting' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-kashyyyk-main', 'on' ) === 'on' ? 'startPlanet=kashyyyk_main' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-kashyyyk-north-dungeons', 'on' ) === 'on' ? 'startPlanet=kashyyyk_north_dungeons' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-kashyyyk-pob-dungeons', 'on' ) === 'on' ? 'startPlanet=kashyyyk_pob_dungeons' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-kashyyyk-rryatt-trail', 'on' ) === 'on' ? 'startPlanet=kashyyyk_rryatt_trail' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-kashyyyk-south-dungeons', 'on' ) === 'on' ? 'startPlanet=kashyyyk_south_dungeons' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-mustafar', 'on' ) === 'on' ? 'startPlanet=mustafar' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-naboo', 'on' ) === 'on' ? 'startPlanet=naboo' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-rori', 'on' ) === 'on' ? 'startPlanet=rori' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-talus', 'on' ) === 'on' ? 'startPlanet=talus' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-tatooine', 'on' ) === 'on' ? 'startPlanet=tatooine' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-yavin4', 'on' ) === 'on' ? 'startPlanet=yavin4' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-corellia', 'on' ) === 'on' ? 'startPlanet=space_corellia' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-dantooine', 'on' ) === 'on' ? 'startPlanet=space_dantooine' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-dathomir', 'on' ) === 'on' ? 'startPlanet=space_dathomir' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-endor', 'on' ) === 'on' ? 'startPlanet=space_endor' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-lok', 'on' ) === 'on' ? 'startPlanet=space_lok' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-kashyyyk', 'on' ) === 'on' ? 'startPlanet=space_kashyyyk' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-naboo', 'on' ) === 'on' ? 'startPlanet=space_naboo' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-nova-orion', 'on' ) === 'on' ? 'startPlanet=space_nova_orion' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-tatooine', 'on' ) === 'on' ? 'startPlanet=space_tatooine' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-yavin4', 'on' ) === 'on' ? 'startPlanet=space_yavin4' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-heavy1', 'on' ) === 'on' ? 'startPlanet=space_heavy1' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-light1', 'on' ) === 'on' ? 'startPlanet=space_light1' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-tutorial', 'on' ) === 'on' ? 'startPlanet=tutorial' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-dungeon1', 'on' ) === 'on' ? 'startPlanet=dungeon1' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-adventure1', 'on' ) === 'on' ? 'startPlanet=adventure1' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-adventure2', 'on' ) === 'on' ? 'startPlanet=adventure2' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-npe-falcon', 'on' ) === 'on' ? 'startPlanet=space_npe_falcon' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-npe-falcon-2', 'on' ) === 'on' ? 'startPlanet=space_npe_falcon_2' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-npe-falcon-3', 'on' ) === 'on' ? 'startPlanet=space_npe_falcon_3' . PHP_EOL : ''; ?>
<?php echo get_option( 'swg-auth-enable-space-ord-mantell', 'on' ) === 'on' ? 'startPlanet=space_ord_mantell' . PHP_EOL : ''; ?>
chatServiceBindInterface=<?php echo get_option( 'swg-auth-chatServiceBindInterface', 'eth0' ) . PHP_EOL; ?>
clusterName=<?php echo get_option( 'swg-auth-cluster-name', 'swg' ) . PHP_EOL; ?>
customerServiceBindInterface=<?php echo get_option( 'swg-auth-customerServiceBindInterface', 'eth0' ) . PHP_EOL; ?>
developmentMode=<?php echo get_option( 'swg-auth-developmentMode', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
metricsDataURL=<?php echo get_site_url(); ?>/?action=swg-auth-metrics
<?php echo ( get_option( 'swg-auth-centralserver-key' ) !== '' ) ? 'metricsSecretKey=' . get_option( 'swg-auth-centralserver-key' ) . PHP_EOL : ''; ?>
newbieTutorialEnabled=<?php echo get_option( 'swg-auth-newbieTutorialEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
webUpdateIntervalSeconds=<?php echo get_option( 'swg-auth-webUpdateIntervalSeconds', '10' ) . PHP_EOL; ?>

[CharacterBuilder]
itvMinUsageLevel=<?php echo get_option( 'swg-auth-itvMinUsageLevel', '0' ) . PHP_EOL; ?>
armorEnabled=<?php echo get_option( 'swg-auth-armorEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
BestResourcesEnabled=<?php echo get_option( 'swg-auth-BestResourcesEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
buffsEnabled=<?php echo get_option( 'swg-auth-buffsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
builderEnabled=<?php echo get_option( 'swg-auth-builderEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
commandsEnabled=<?php echo get_option( 'swg-auth-commandsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
craftingEnabled=<?php echo get_option( 'swg-auth-craftingEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
creditsEnabled=<?php echo get_option( 'swg-auth-creditsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
deedsEnabled=<?php echo get_option( 'swg-auth-deedsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
devEnabled=<?php echo get_option( 'swg-auth-devEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
DraftSchematicsEnabled=<?php echo get_option( 'swg-auth-DraftSchematicsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
factionEnabled=<?php echo get_option( 'swg-auth-factionEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
HeroicFlagEnabled=<?php echo get_option( 'swg-auth-HeroicFlagEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
jediEnabled=<?php echo get_option( 'swg-auth-jediEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
miscitemEnabled=<?php echo get_option( 'swg-auth-miscitemEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
pahallEnabled=<?php echo get_option( 'swg-auth-pahallEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
petsEnabled=<?php echo get_option( 'swg-auth-petsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
questEnabled=<?php echo get_option( 'swg-auth-questEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
resourcesEnabled=<?php echo get_option( 'swg-auth-resourcesEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
shipsEnabled=<?php echo get_option( 'swg-auth-shipsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
skillsEnabled=<?php echo get_option( 'swg-auth-skillsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
vehiclesEnabled=<?php echo get_option( 'swg-auth-vehiclesEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
warpsEnabled=<?php echo get_option( 'swg-auth-warpsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
weaponsEnabled=<?php echo get_option( 'swg-auth-weaponsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[ChatServer]
centralServerAddress=<?php echo get_option( 'swg-auth-server-ip', '192.168.0.0' ) . PHP_EOL; ?>
clusterName=<?php echo get_option( 'swg-auth-cluster-name', 'swg' ) . PHP_EOL; ?>
gatewayServerIP=<?php echo get_option( 'swg-auth-gatewayServerIP', '127.0.0.1' ) . PHP_EOL; ?>
gatewayServerPort=<?php echo get_option( 'swg-auth-gatewayServerPort', '5001' ) . PHP_EOL; ?>
registrarHost=<?php echo get_option( 'swg-auth-registrarHost', '127.0.0.1' ) . PHP_EOL; ?>
registrarPort=<?php echo get_option( 'swg-auth-registrarPort', '5000' ) . PHP_EOL; ?>

[CommodityServer]
minutesActiveToUnaccessed=<?php echo get_option( 'swg-auth-minutesActiveToUnaccessed', '43200' ) . PHP_EOL; ?>
minutesUnaccessedToEndangered=<?php echo get_option( 'swg-auth-minutesUnaccessedToEndangered', '7200' ) . PHP_EOL; ?>
minutesEmptyToEndangered=<?php echo get_option( 'swg-auth-minutesEmptyToEndangered', '21600' ) . PHP_EOL; ?>
minutesEndangeredToRemoved=<?php echo get_option( 'swg-auth-minutesEndangeredToRemoved', '21600' ) . PHP_EOL; ?>
minutesVendorAuctionTimer=<?php echo get_option( 'swg-auth-minutesVendorAuctionTimer', '43200' ) . PHP_EOL; ?>
minutesVendorItemTimer=<?php echo get_option( 'swg-auth-minutesVendorItemTimer', '43200' ) . PHP_EOL; ?>

[ConnectionServer]
chatServiceBindInterface=<?php echo get_option( 'swg-auth-chatServiceBindInterface', 'eth0' ) . PHP_EOL; ?>
clientOverflowLimit=<?php echo get_option( 'swg-auth-clientOverflowLimit', '5242880' ) . PHP_EOL; ?>
customerServiceBindInterface=<?php echo get_option( 'swg-auth-customerServiceBindInterface', 'eth0' ) . PHP_EOL; ?>
disableWorldSnapshot=<?php echo get_option( 'swg-auth-disableWorldSnapshot', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
pingPort=<?php echo get_option( 'swg-auth-pingPort', '44462' ) . PHP_EOL; ?>
validateClientVersion=<?php echo get_option( 'swg-auth-validateClientVersion', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
validateStationKey=<?php echo get_option( 'swg-auth-validateStationKey', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[Custom]
dailyMissionXpLimit=<?php echo get_option( 'swg-auth-dailyMissionXpLimit', '10' ) . PHP_EOL; ?>
grantElderBuff=<?php echo get_option( 'swg-auth-grantElderBuff', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
reverseEngineeringBonusMultiplier=<?php echo get_option( 'swg-auth-reverseEngineeringBonusMultipliert', '1.0' ) . PHP_EOL; ?>

[dbProcess]
centralServerAddress=<?php echo get_option( 'swg-auth-server-ip', '192.168.0.0' ) . PHP_EOL; ?>
databaseProtocol=<?php echo get_option( 'swg-auth-databaseProtocol', 'OCI' ) . PHP_EOL; ?>
databasePWD=<?php echo get_option( 'swg-auth-odb-password', 'swg' ) . PHP_EOL; ?>
databaseUID=<?php echo get_option( 'swg-auth-odb-username', 'swg' ) . PHP_EOL; ?>
DSN=<?php echo get_option( 'swg-auth-DSN', '//127.0.0.1/swg' ) . PHP_EOL; ?>
loaderThreads=<?php echo get_option( 'swg-auth-loaderThreads', '1' ) . PHP_EOL; ?>
persisterThreads=<?php echo get_option( 'swg-auth-persisterThreads', '1' ) . PHP_EOL; ?>
sharedLoginMode=<?php echo get_option( 'swg-auth-sharedLoginMode', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
useTemplates=<?php echo get_option( 'swg-auth-useTemplates', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[Dungeon]
Corellian_Corvette_Imperial=<?php echo get_option( 'swg-auth-Corellian_Corvette_Imperial', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
Corellian_Corvette_Neutral=<?php echo get_option( 'swg-auth-Corellian_Corvette_Neutral', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
Corellian_Corvette_Rebel=<?php echo get_option( 'swg-auth-Corellian_Corvette_Rebel', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
Death_Watch=<?php echo get_option( 'swg-auth-Death_Watch', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
Geonosian=<?php echo get_option( 'swg-auth-Geonosian', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
serverSwitch=<?php echo get_option( 'swg-auth-serverSwitch', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[EventTeam]
anniversary=<?php echo get_option( 'swg-auth-anniversary', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
forceFoolsDay=<?php echo get_option( 'swg-auth-forceFoolsDay', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
gcwraid=<?php echo get_option( 'swg-auth-gcwraid', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
goldenTicket=<?php echo get_option( 'swg-auth-goldenTicket', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
goldenTicketDropChance=<?php echo get_option( 'swg-auth-goldenTicketDropChance', '2' ) . PHP_EOL; ?>
goldenTicketsAvailable=<?php echo get_option( 'swg-auth-goldenTicketsAvailable', '10' ) . PHP_EOL; ?>
restussEvent=<?php echo get_option( 'swg-auth-restussEvent', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
restussPhase=<?php echo get_option( 'swg-auth-restussPhase', '2' ) . PHP_EOL; ?>
restussProgressionOn=<?php echo get_option( 'swg-auth-restussProgressionOn', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[GameServer]
chroniclesXpModifier=<?php echo get_option( 'swg-auth-chroniclesXpModifier', '1.0' ) . PHP_EOL; ?>
gcwPointBonus=<?php echo get_option( 'swg-auth-gcwPointBonus', '5.0' ) . PHP_EOL; ?>
gcwTokenBonus=<?php echo get_option( 'swg-auth-gcwTokenBonus', '5.0' ) . PHP_EOL; ?>
harvesterExtractionRateMultiplier=<?php echo get_option( 'swg-auth-harvesterExtractionRateMultiplier', '5.0' ) . PHP_EOL; ?>
xpMultiplier=<?php echo get_option( 'swg-auth-xpMultiplier', '3' ) . PHP_EOL; ?>

empireday_ceremony=<?php echo get_option( 'swg-auth-empireday_ceremony', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
foolsDay=<?php echo get_option( 'swg-auth-foolsDay', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
halloween=<?php echo get_option( 'swg-auth-halloween', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
lifeday=<?php echo get_option( 'swg-auth-lifeday', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
loveday=<?php echo get_option( 'swg-auth-loveday', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

adminGodToAll=<?php echo get_option( 'swg-auth-adminGodToAll', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
adminGodToAllGodLevel=<?php echo get_option( 'swg-auth-adminGodToAllGodLevel', '50' ) . PHP_EOL; ?>
aiLoggingEnabled=<?php echo get_option( 'swg-auth-aiLoggingEnabled', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
allowMasterObjectCreation=<?php echo get_option( 'swg-auth-allowMasterObjectCreation', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
allowPlayersToPackVendors=<?php echo get_option( 'swg-auth-allowPlayersToPackVendors', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
centralServerAddress=<?php echo get_option( 'swg-auth-server-ip', '192.168.0.0' ) . PHP_EOL; ?>
chroniclesChroniclerGoldTokenChanceOverride=<?php echo get_option( 'swg-auth-chroniclesChroniclerGoldTokenChanceOverride', '15' ) . PHP_EOL; ?>
chroniclesChroniclerSilverTokenNumModifier=<?php echo get_option( 'swg-auth-chroniclesChroniclerSilverTokenNumModifier', '2' ) . PHP_EOL; ?>
chroniclesQuestorGoldTokenChanceOverride=<?php echo get_option( 'swg-auth-chroniclesQuestorGoldTokenChanceOverride', '15' ) . PHP_EOL; ?>
chroniclesQuestorSilverTokenNumModifier=<?php echo get_option( 'swg-auth-chroniclesQuestorSilverTokenNumModifier', '2' ) . PHP_EOL; ?>
combatUpgradeReward=<?php echo get_option( 'swg-auth-combatUpgradeReward', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
commoditiesMarketEnabled=<?php echo get_option( 'swg-auth-commoditiesMarketEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
createAppearances=<?php echo get_option( 'swg-auth-createAppearances', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
createZoneObjects=<?php echo get_option( 'swg-auth-createZoneObjects', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
debugMode=<?php echo get_option( 'swg-auth-debugMode', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
deleteEventProps=<?php echo get_option( 'swg-auth-deleteEventProps', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
disableResources=<?php echo get_option( 'swg-auth-disableResources', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
drainRate=<?php echo get_option( 'swg-auth-drainRate', '0.00065' ) . PHP_EOL; ?>
enableCovertImperialMercenary=<?php echo get_option( 'swg-auth-enableCovertImperialMercenary', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
enableCovertRebelMercenary=<?php echo get_option( 'swg-auth-enableCovertRebelMercenary', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
enableOvertImperialMercenary=<?php echo get_option( 'swg-auth-enableOvertImperialMercenary', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
enableOvertRebelMercenary=<?php echo get_option( 'swg-auth-enableOvertRebelMercenary', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
enablePreload=<?php echo get_option( 'swg-auth-enablePreload', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
fatalOnGoldPobChange=<?php echo get_option( 'swg-auth-fatalOnGoldPobChange', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
flashSpeederReward=<?php echo get_option( 'swg-auth-flashSpeederReward', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
gcwcitybestine=<?php echo get_option( 'swg-auth-gcwcitybestine', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
gcwcitydearic=<?php echo get_option( 'swg-auth-gcwcitydearic', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
gcwcitykeren=<?php echo get_option( 'swg-auth-gcwcitykeren', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
gcwInvasionCityMaximumRunning=<?php echo get_option( 'swg-auth-gcwInvasionCityMaximumRunning', '1' ) . PHP_EOL; ?>
gcwInvasionCycleTime=<?php echo get_option( 'swg-auth-gcwInvasionCycleTime', '1' ) . PHP_EOL; ?>
grantGift=<?php echo get_option( 'swg-auth-grantGift', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
hibernateDistance=<?php echo get_option( 'swg-auth-hibernateDistance', '65.0' ) . PHP_EOL; ?>
hibernateEnabled=<?php echo get_option( 'swg-auth-hibernateEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
hibernateProxies=<?php echo get_option( 'swg-auth-hibernateProxies', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
idleLogoutTimeSec=<?php echo get_option( 'swg-auth-idleLogoutTimeSec', '300' ) . PHP_EOL; ?>
javaConsoleDebugMessages=<?php echo get_option( 'swg-auth-javaConsoleDebugMessages', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
javaEngineProfiling=<?php echo get_option( 'swg-auth-javaEngineProfiling', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
javaLocalRefLimit=<?php echo get_option( 'swg-auth-javaLocalRefLimit', '16' ) . PHP_EOL; ?>
javaVMName=<?php echo get_option( 'swg-auth-javaVMName', 'sun' ) . PHP_EOL; ?>
maxGoldNetworkId=<?php echo get_option( 'swg-auth-maxGoldNetworkId', '10000000' ) . PHP_EOL; ?>
maxItemAttribBonus=<?php echo get_option( 'swg-auth-maxItemAttribBonus', '250' ) . PHP_EOL; ?>
maxObjectSkillModBonus=<?php echo get_option( 'swg-auth-maxObjectSkillModBonus', '999' ) . PHP_EOL; ?>
maxRespecCount=<?php echo get_option( 'swg-auth-maxRespecCount', '0' ) . PHP_EOL; ?>
maxSocketSkillModBonus=<?php echo get_option( 'swg-auth-maxSocketSkillModBonus', '999' ) . PHP_EOL; ?>
minRespecIntervalInSeconds=<?php echo get_option( 'swg-auth-minRespecIntervalInSeconds', '43200' ) . PHP_EOL; ?>
mountsEnabled=<?php echo get_option( 'swg-auth-mountsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
nameValidationAcceptAll=<?php echo get_option( 'swg-auth-nameValidationAcceptAll', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
regenActionScale=<?php echo get_option( 'swg-auth-regenActionScale', '1.75' ) . PHP_EOL; ?>
regenBase=<?php echo get_option( 'swg-auth-regenBase', '0.999' ) . PHP_EOL; ?>
regenConstant=<?php echo get_option( 'swg-auth-regenConstant', '0' ) . PHP_EOL; ?>
regenerationRate=<?php echo get_option( 'swg-auth-regenerationRate', '0.0064' ) . PHP_EOL; ?>
regenHealthScale=<?php echo get_option( 'swg-auth-regenHealthScale', '6' ) . PHP_EOL; ?>
regenMindScale=<?php echo get_option( 'swg-auth-regenMindScale', '0.5' ) . PHP_EOL; ?>
regenScale=<?php echo get_option( 'swg-auth-regenScale', '2.5' ) . PHP_EOL; ?>
reservedObjectIds=<?php echo get_option( 'swg-auth-reservedObjectIds', '1000000' ) . PHP_EOL; ?>
respecDurationAllowedInSeconds=<?php echo get_option( 'swg-auth-respecDurationAllowedInSeconds', '2419200' ) . PHP_EOL; ?>
rlsDropChance=<?php echo get_option( 'swg-auth-rlsDropChance', '0.5' ) . PHP_EOL; ?>
rlsEnabled=<?php echo get_option( 'swg-auth-rlsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
rlsExceptionalDropChance=<?php echo get_option( 'swg-auth-rlsExceptionalDropChance', '25' ) . PHP_EOL; ?>
rlsLegendaryDropChance=<?php echo get_option( 'swg-auth-rlsLegendaryDropChance', '5' ) . PHP_EOL; ?>
rlsMaxLevelsAbovePlayerLevel=<?php echo get_option( 'swg-auth-rlsMaxLevelsAbovePlayerLevel', '6' ) . PHP_EOL; ?>
rlsMaxLevelsBelowPlayerLevel=<?php echo get_option( 'swg-auth-rlsMaxLevelsBelowPlayerLevel', '6' ) . PHP_EOL; ?>
rlsMinDistanceFromLastLoot=<?php echo get_option( 'swg-auth-rlsMinDistanceFromLastLoot', '5' ) . PHP_EOL; ?>
rlsMinTimeBetweenAwards=<?php echo get_option( 'swg-auth-rlsMinTimeBetweenAwards', '900' ) . PHP_EOL; ?>
rlsRareDropChance=<?php echo get_option( 'swg-auth-rlsRareDropChance', '70' ) . PHP_EOL; ?>
scriptPath=<?php echo get_option( 'swg-auth-scriptPath', '../../data/sku.0/sys.server/compiled/game/' ) . PHP_EOL; ?>
scriptWatcherInterruptTime=<?php echo get_option( 'swg-auth-scriptWatcherInterruptTime', '0' ) . PHP_EOL; ?>
scriptWatcherWarnTime=<?php echo get_option( 'swg-auth-scriptWatcherWarnTime', '5000' ) . PHP_EOL; ?>
sendBreadcrumbs=<?php echo get_option( 'swg-auth-sendBreadcrumbs', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
sendPlayerTransform=<?php echo get_option( 'swg-auth-sendPlayerTransform', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
serverLoadLevel=<?php echo get_option( 'swg-auth-serverLoadLevel', 'heavy' ) . PHP_EOL; ?>
serverSpawnLimit=<?php echo get_option( 'swg-auth-serverSpawnLimit', '60000' ) . PHP_EOL; ?>
spaceGcwCorelliaActive=<?php echo get_option( 'swg-auth-spaceGcwCorelliaActive', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
spaceGcwCorelliaDelay=<?php echo get_option( 'swg-auth-spaceGcwCorelliaDelay', '3' ) . PHP_EOL; ?>
spaceGcwCorelliaStagger=<?php echo get_option( 'swg-auth-spaceGcwCorelliaStagger', '2' ) . PHP_EOL; ?>
spaceGcwDantooineActive=<?php echo get_option( 'swg-auth-spaceGcwDantooineActive', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
spaceGcwDantooineDelay=<?php echo get_option( 'swg-auth-spaceGcwDantooineDelay', '3' ) . PHP_EOL; ?>
spaceGcwDantooineStagger=<?php echo get_option( 'swg-auth-spaceGcwDantooineStagger', '0' ) . PHP_EOL; ?>
spaceGcwGunshipPlayerCeiling=<?php echo get_option( 'swg-auth-spaceGcwGunshipPlayerCeiling', '10' ) . PHP_EOL; ?>
spaceGcwLengthOfBattle=<?php echo get_option( 'swg-auth-spaceGcwLengthOfBattle', '3600.0' ) . PHP_EOL; ?>
spaceGcwLokActive=<?php echo get_option( 'swg-auth-spaceGcwLokActive', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
spaceGcwLokDelay=<?php echo get_option( 'swg-auth-spaceGcwLokDelay', '3' ) . PHP_EOL; ?>
spaceGcwLokStagger=<?php echo get_option( 'swg-auth-spaceGcwLokStagger', '2' ) . PHP_EOL; ?>
spaceGcwLossPointModifier=<?php echo get_option( 'swg-auth-spaceGcwLossPointModifier', '1.0' ) . PHP_EOL; ?>
spaceGcwLossTokenModifier=<?php echo get_option( 'swg-auth-spaceGcwLossTokenModifier', '1.0' ) . PHP_EOL; ?>
spaceGcwMaxSupportShips=<?php echo get_option( 'swg-auth-spaceGcwMaxSupportShips', '30' ) . PHP_EOL; ?>
spaceGcwNabooActive=<?php echo get_option( 'swg-auth-spaceGcwNabooActive', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
spaceGcwNabooDelay=<?php echo get_option( 'swg-auth-spaceGcwNabooDelay', '3' ) . PHP_EOL; ?>
spaceGcwNabooStagger=<?php echo get_option( 'swg-auth-spaceGcwNabooStagger', '4' ) . PHP_EOL; ?>
spaceGcwPobPlayerCeiling=<?php echo get_option( 'swg-auth-spaceGcwPobPlayerCeiling', '4' ) . PHP_EOL; ?>
spaceGcwPointAward=<?php echo get_option( 'swg-auth-spaceGcwPointAward', '2500' ) . PHP_EOL; ?>
spaceGcwPrepatoryTime=<?php echo get_option( 'swg-auth-spaceGcwPrepatoryTime', '900.0' ) . PHP_EOL; ?>
spaceGcwPvEPointModifier=<?php echo get_option( 'swg-auth-spaceGcwPvEPointModifier', '1.0' ) . PHP_EOL; ?>
spaceGcwPvETokenModifier=<?php echo get_option( 'swg-auth-spaceGcwPvETokenModifier', '1.0' ) . PHP_EOL; ?>
spaceGcwPvPPointModifier=<?php echo get_option( 'swg-auth-spaceGcwPvPPointModifier', '2.0' ) . PHP_EOL; ?>
spaceGcwPvPTokenModifier=<?php echo get_option( 'swg-auth-spaceGcwPvPTokenModifier', '2.0' ) . PHP_EOL; ?>
spaceGcwTatooineActive=<?php echo get_option( 'swg-auth-spaceGcwTatooineActive', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
spaceGcwTatooineDelay=<?php echo get_option( 'swg-auth-spaceGcwTatooineDelay', '3' ) . PHP_EOL; ?>
spaceGcwTatooineStagger=<?php echo get_option( 'swg-auth-spaceGcwTatooineStagger', '0' ) . PHP_EOL; ?>
spaceGcwTokenAward=<?php echo get_option( 'swg-auth-spaceGcwTokenAward', '25' ) . PHP_EOL; ?>
spaceGcwTotalSupportSpawn=<?php echo get_option( 'swg-auth-spaceGcwTotalSupportSpawn', '60' ) . PHP_EOL; ?>
spaceGcwWinPointModifier=<?php echo get_option( 'swg-auth-spaceGcwWinPointModifier', '2.0' ) . PHP_EOL; ?>
spaceGcwWinTokenModifier=<?php echo get_option( 'swg-auth-spaceGcwWinTokenModifier', '2.0' ) . PHP_EOL; ?>
spawnAllResources=<?php echo get_option( 'swg-auth-spawnAllResourcess', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
startX=<?php echo get_option( 'swg-auth-startX', '3585.0' ) . PHP_EOL; ?>
startY=<?php echo get_option( 'swg-auth-startY', '10.0' ) . PHP_EOL; ?>
startZ=<?php echo get_option( 'swg-auth-startZ', '2578.0' ) . PHP_EOL; ?>
suiListLimit=<?php echo get_option( 'swg-auth-suiListLimit', '50' ) . PHP_EOL; ?>
useTemplates=<?php echo get_option( 'swg-auth-useTemplates', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
veteranDebugEnableOverrideAccountAge=<?php echo get_option( 'swg-auth-veteranDebugEnableOverrideAccountAge', '9999' ) . PHP_EOL; ?>
veteranDebugTriggerAll=<?php echo get_option( 'swg-auth-veteranDebugTriggerAll', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[LoginPing]
passthroughMode=<?php echo get_option( 'swg-auth-passthroughMode', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[LoginServer]
databasePWD=<?php echo get_option( 'swg-auth-odb-password', 'swg' ) . PHP_EOL; ?>
databaseUID=<?php echo get_option( 'swg-auth-odb-username', 'swg' ) . PHP_EOL; ?>
developmentMode=<?php echo get_option( 'swg-auth-developmentMode', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
DSN=<?php echo get_option( 'swg-auth-DSN', '//127.0.0.1/swg' ) . PHP_EOL; ?>
easyExternalAccess=<?php echo get_option( 'swg-auth-easyExternalAccess', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
<?php echo ( get_option( 'swg-auth-loginserver-key' ) !== '' ) ? 'externalAuthSecretKey=' . get_option( 'swg-auth-loginserver-key' ) . PHP_EOL : ''; ?>
externalAuthURL=<?php echo get_site_url(); ?>/?action=swg-auth
useExternalAuth=<?php echo get_option( 'swg-auth-useExternalAuth', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
<?php echo ( get_option( 'swg-auth-auth-type' ) === 'JsonWebAPI' ) ? "useJsonWebApi=true" . PHP_EOL : ''; ?>
validateClientVersion=<?php echo get_option( 'swg-auth-validateClientVersion', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
validateStationKey=<?php echo get_option( 'swg-auth-validateStationKey', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[PlanetServer]
loadWholePlanet=<?php echo get_option( 'swg-auth-loadWholePlanet', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
numTutorialServers=<?php echo get_option( 'swg-auth-numTutorialServers', '1' ) . PHP_EOL; ?>

[Quest]
CommunityCraftingLimit=<?php echo get_option( 'swg-auth-CommunityCraftingLimit', '200' ) . PHP_EOL; ?>
CraftingContract=<?php echo get_option( 'swg-auth-CraftingContract', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
CrowdPleaser=<?php echo get_option( 'swg-auth-CrowdPleaser', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[ScriptFlags]
liveSpaceServer=<?php echo get_option( 'swg-auth-liveSpaceServer', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
npeSequencersActive=<?php echo get_option( 'swg-auth-npeSequencersActive', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
spawnersOn=<?php echo get_option( 'swg-auth-spawnersOn', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>

[ServerMetrics]
metricsServerPort=<?php echo get_option( 'swg-auth-metricsServerPort', '0' ) . PHP_EOL; ?>

[ServerUtility]
externalAdminLevelsEnabled=<?php echo get_option( 'swg-auth-externalAdminLevelsEnabled', 'on' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
<?php echo ( get_option( 'swg-auth-serverutility-key' ) !== '' ) ? 'externalAdminLevelsSecretKey=' . get_option( 'swg-auth-serverutility-key' ) . PHP_EOL : ''; ?>
externalAdminLevelsURL=<?php echo get_site_url(); ?>/?action=swg-auth-admin-level

[SharedFile]
searchPath0=<?php echo get_option( 'swg-auth-searchPath0', '../../data/sku.0/sys.client/compiled/clientdata/' ) . PHP_EOL; ?>
searchPath1=<?php echo get_option( 'swg-auth-searchPath1a', '../../data/sku.0/sys.server/built/game/' ) . PHP_EOL; ?>
searchPath1=<?php echo get_option( 'swg-auth-searchPath1b', '../../data/sku.0/sys.shared/built/game/' ) . PHP_EOL; ?>
searchPath2=<?php echo get_option( 'swg-auth-searchPath2a', '../../data/sku.0/sys.server/compiled/game/' ) . PHP_EOL; ?>
searchPath2=<?php echo get_option( 'swg-auth-searchPath2b', '../../data/sku.0/sys.shared/compiled/game/' ) . PHP_EOL; ?>

[SharedFoundation]
debugReportLongFrames=<?php echo get_option( 'swg-auth-debugReportLongFrames', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
fatalCallStackDepth=<?php echo get_option( 'swg-auth-fatalCallStackDepth', '10' ) . PHP_EOL; ?>
frameRateLimit=<?php echo get_option( 'swg-auth-frameRateLimit', '10' ) . PHP_EOL; ?>
warningCallStackDepth=<?php echo get_option( 'swg-auth-warningCallStackDepth', '-1' ) . PHP_EOL; ?>

[SharedLog]
#logTarget=file:logs/balance.log{c-!GameBalance}
#logTarget=file:logs/commodities.txt{c-!CommoditiesServer}
#logTarget=file:logs/cts.txt{d-!CharacterTransfer:p+TransferServer:d+TransferServer:c+CharacterTransfer}
#logTarget=file:logs/customerService.log{c-!CustomerService}
#logTarget=file:logs/log.txt{c-profile:c-CustomerService:c-stderr}
#logTarget=file:logs/population.log{c-!PopulationLog}
#logTarget=file:logs/profile.txt{c-!profile}
#logTarget=file:logs/serverclock.log{c-!ServerClock}
#logTarget=file:logs/startupLog.log{c-*:c+ServerStartup:c+Preload}
#logTarget=file:logs/stderr.txt{c-!stderr}
#logTarget=file:logs/taskProcessDied.txt{c-!TaskProcessDied}
#logTarget=net:<?php echo get_option( 'swg-auth-server-ip', '192.168.0.0' ); ?>:44467

[SharedNetwork]
byteCountWarnThreshold=<?php echo get_option( 'swg-auth-byteCountWarnThreshold', '1000000' ) . PHP_EOL; ?>
congestionWindowMinimum=<?php echo get_option( 'swg-auth-congestionWindowMinimum', '0' ) . PHP_EOL; ?>
enableFlushAndConfirmAllData=<?php echo get_option( 'swg-auth-enableFlushAndConfirmAllData', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
fragmentSize=<?php echo get_option( 'swg-auth-fragmentSize', '500' ) . PHP_EOL; ?>
incomingBufferSize=<?php echo get_option( 'swg-auth-incomingBufferSize', '4194304' ) . PHP_EOL; ?>
logBackloggedPacketThreshold=<?php echo get_option( 'swg-auth-logBackloggedPacketThreshold', '0' ) . PHP_EOL; ?>
maxOutstandingBytes=<?php echo get_option( 'swg-auth-maxOutstandingBytes', '4194304' ) . PHP_EOL; ?>
maxOutstandingPackets=<?php echo get_option( 'swg-auth-maxOutstandingPackets', '400' ) . PHP_EOL; ?>
maxRawPacketSize=<?php echo get_option( 'swg-auth-maxRawPacketSize', '500' ) . PHP_EOL; ?>
noDataTimeout=<?php echo get_option( 'swg-auth-noDataTimeout', '1000000' ) . PHP_EOL; ?>
oldestUnacknowledgedTimeout=<?php echo get_option( 'swg-auth-oldestUnacknowledgedTimeout', '0' ) . PHP_EOL; ?>
outgoingBufferSize=<?php echo get_option( 'swg-auth-outgoingBufferSize', '4194304' ) . PHP_EOL; ?>
overflowLimit=<?php echo get_option( 'swg-auth-overflowLimit', '0' ) . PHP_EOL; ?>
packetHistoryMax=<?php echo get_option( 'swg-auth-packetHistoryMax', '512' ) . PHP_EOL; ?>
pooledPacketMax=<?php echo get_option( 'swg-auth-pooledPacketMax', '32000' ) . PHP_EOL; ?>
pooledPacketSize=<?php echo get_option( 'swg-auth-pooledPacketSize', '256' ) . PHP_EOL; ?>
reportMessages=<?php echo get_option( 'swg-auth-reportMessages', '' ) === 'on' ? 'true' : 'false'; echo PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPorta', '44451' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortb', '44452' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortc', '44455' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortd', '44459' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPorte', '44463' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortf', '44464' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortg', '44467' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPorth', '44480' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPorti', '50001' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortj', '60000' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortk', '60001' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortl', '60002' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortm', '61000' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortn', '61222' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPorto', '61232' ) . PHP_EOL; ?>
reservedPort=<?php echo get_option( 'swg-auth-reservedPortp', '61242' ) . PHP_EOL; ?>

[TaskManager]
clusterName=<?php echo get_option( 'swg-auth-cluster-name', 'swg' ) . PHP_EOL; ?>
loginServerAddress=<?php echo get_option( 'swg-auth-server-ip', '192.168.0.0' ) . PHP_EOL; ?>
node0=<?php echo get_option( 'swg-auth-server-ip', '192.168.0.0' ) . PHP_EOL; ?>
environmentVariable=<?php echo get_option( 'swg-auth-environmentVariablea', 'NLS_LANG=american_america.utf8' ) . PHP_EOL; ?>
environmentVariable=<?php echo get_option( 'swg-auth-environmentVariableb', 'PATH+=/usr/lib/jvm/java-11-openjdk/bin:./' ) . PHP_EOL; ?>
environmentVariable=<?php echo get_option( 'swg-auth-environmentVariablec', 'LD_LIBRARY_PATH+=/usr/lib/jvm/java-11-openjdk/lib:/usr/lib/jvm/java-11-openjdk/lib/server:./' ) . PHP_EOL; ?>
<?php echo get_option( 'swg-auth-custom-server-setting' ); ?>
<?php
// After outputting the cfg, we don't want WordPress to continue
die;
}
