using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace MasterCoreMVC.Migrations
{
    public partial class InitialCreate : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "AppUser",
                columns: table => new
                {
                    id = table.Column<int>(type: "INTEGER", nullable: false)
                        .Annotation("Sqlite:Autoincrement", true),
                    username = table.Column<string>(type: "TEXT", nullable: true),
                    password = table.Column<string>(type: "TEXT", nullable: true),
                    name = table.Column<string>(type: "TEXT", nullable: true),
                    roles = table.Column<string>(type: "TEXT", nullable: true),
                    isactive = table.Column<bool>(type: "INTEGER", nullable: false),
                    create_at = table.Column<DateTime>(type: "TEXT", nullable: true),
                    create_date = table.Column<DateTime>(type: "TEXT", nullable: true),
                    update_at = table.Column<DateTime>(type: "TEXT", nullable: true),
                    update_date = table.Column<DateTime>(type: "TEXT", nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AppUser", x => x.id);
                });

            migrationBuilder.InsertData(
                table: "AppUser",
                columns: new[] { "id", "create_at", "create_date", "isactive", "name", "password", "roles", "update_at", "update_date", "username" },
                values: new object[] { 1, null, null, true, "Preedee P.", "016623", "Admin", null, null, "016623" });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "AppUser");
        }
    }
}
