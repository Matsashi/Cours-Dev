import { getCurrencySymbol } from '@angular/common';
import { Component } from '@angular/core';

@Component({
  selector: "app-server",
  templateUrl: './server.component.html',
  styles: ['.on {color: white;}']
})

export class ServerComponent{
  serverID: number=1;
  serversStatus: string="ON";
  serverDesc: string="C'est le serveur Minecraft de Fanta&Bob où ils minent des FantaCoin";
  colorA: string="red";
  colorB: string="green";

  getServerId(){
    return this.serverID;
  }
  getColor(){
    if(this.serversStatus=="ON"){
      return this.colorB;
    }else{
      return this.colorA;
    }
  }
  constructor(){

    this.serversStatus = Math.random()>0.5 ? "ON" : "OFF"
  }
}
