import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  servers: Array<string>=[];

  onAddServer() {
    this.servers.push('Un Autre Server');
  }

  onRemoveServer(id: number) {
    const position = id + 1;
    this.servers.splice(position, 1);
  }
}
