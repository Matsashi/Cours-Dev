import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-servers',
  templateUrl: './servers.component.html',
  styleUrls: ['./servers.component.css']
})
export class ServersComponent implements OnInit {
  autorizServer: boolean=false;
  serverCreationStatus: any="Aucun serveur créé";
  serverName: string="HELLO ";
  serverCreated:boolean = false;
  servers = ['SRV 1', 'SERVER II','COOL','YOLO'];


  onCreateServer(){
    this.servers.push(this.serverName);
    this.serverCreated = true;
    this.serverCreationStatus = `OK : Serveur Crée : `+this.serverName;
  }
  onUpdateServerName($event: Event){
    console.log($event);
    this.serverName = (<HTMLInputElement>$event.target).value;
  }
  constructor() {
    setTimeout((autorizServer: boolean)=>{
      this.autorizServer=true;
    }, 3000)
   }

  ngOnInit(): void {
  }


}
