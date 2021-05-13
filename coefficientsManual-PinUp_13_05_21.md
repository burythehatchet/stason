# API коэффициенты

### Для получения возможности использования API, необходимо запросить ключ для подписи запросов на странице [API коэффициенты].

## Parameters

Serialization is binary with MessagePack. All the data written to WS and back should be binary serialized with MessagePack.
For more information, please, follow the link: https://msgpack.org/.

## Document Revision

<table>
    <tr>
        <td align="center"><b>Date</b></td>
        <td align="center"><b>Comments</b></td>
    </tr>
    <tr>
        <td align="center">01/02/2021</td>
        <td>
            <b>"4th element ( arr[3], int8)"</b> is added in <b>"GetTree" Request.</b><br>
            <b>"2nd element ( arr[1], int8)"</b> is added in <b>"GetDetailedTree" Request.</b>
        </td>
    </tr>
    <tr>
        <td align="center">23/04/2021</td>
        <td>
            <b>"STGIDS"</b> property is added in <b>"StakeType"</b> entity;<br>
            <b>"STKTPSG"</b> property is added in <b>"DetailedMatch"</b> entity;<br>
            <b>"StakeTypesGroup"</b> entity is added;<br>
            <b>"TSNM"</b> property is added in <b>"Stake"</b> entity;<br>
            <b>"3rd element"</b> is added in the <b>"DATA"</b> field of <b>"GetDetailedTree"</b>;<br>
            <b>"STGID"</b> property is added in <b>"Stake"</b> entity;<br>
            Methods <b>GetTree, GetStake, GetMatch, GetStakesByType, GetMatches, GetMatchV1, GetMatchesV1</b> are removed;<br>
            <b>"CRPRD"</b> property is added in <b>"xMatch"</b> entity.
        </td>
    </tr>
    <tr>
        <td align="center">05/05/2021</td>
        <td>
            <b>"GetDetailedStakesById"</b> method is added.<br>
            <b>"GetStakeTypeGroups"</b> method is added.<br>
            <b>"StakesGroupModel"</b> entity is added.<br>
        </td>
    </tr>
    <tr>
        <td align="center">13/05/2021</td>
        <td>
            <b>"2nd and 3rd elements"</b> are exchanged in <b>"GetDetailedTree" Request;</b><br>
            <b>"SId", "STId", "CT", "IFD"</b> properties are added in <b>"StakeTypesGroup"</b>  entity;<br>
            <b>"STGIDS"</b> property is removed from <b>"StakeType"</b> entity;<br>
            <b>"STGID"</b> property is removed from <b>"Stake"</b> entity.<br>
        </td>
    </tr>
</table>

## Request / Response with WS

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>WSRequest</b></p>
            <p>This is a class for all types of WS request</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            Enumeration of type <b>WSCommand</b>. Derived from unsigned short (unsigned 16 bit integer). So in serialization it occurs as two bytes.
        </td>
        <td>This enumeration specifies the logic of a command, for example GetSport.</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">object</td>
        <td>Could be any object serializable with message pack. Main data is here. Can determine which object should cast to, by RT and CMD.</td>
    </tr>
</table>
<br>
<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>WSCommand</b></p>
            <p>Enumeration, derived from unsigned short (unsigned 16 bit integer). So in serialization it occurs as two bytes.</p>
            <p>This enumeration specifies the logic of a command, for example GetSport.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Enum member</b></td>
        <td align="center"><b>Ushort value</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">GetSport</td>
        <td align="center">2</td>
        <td>Command to get single sport info command.</td>
    </tr>
    <tr>
        <td align="center">GetTournament</td>
        <td align="center">6</td>
        <td>Command to get tournament command.</td>
    </tr>
    <tr>
        <td align="center">GetChampionship</td>
        <td align="center">7</td>
        <td>Command to get championship command.</td>
    </tr>
    <tr>
        <td align="center"><b>GetDetailedTree</b></td>
        <td align="center"><b>11</b></td>
        <td><b>Command to get main pre-match/live tree detailed information starting from Sport to Match.</b></td>
    </tr>
    <tr>
        <td align="center"><b>GetDetailedMatches</b></td>
        <td align="center"><b>12</b></td>
        <td><b>Command to get detailed matches based on the given parameters.</b></td>
    </tr>
    <tr>
        <td align="center"><b>GetDetailedStakes</b></td>
        <td align="center"><b>13</b></td>
        <td><b>Command to get detailed stakes based on the given parameters.</b></td>
    </tr>
    <tr>
        <td align="center"><b>GetDetailedStakesById</b></td>
        <td align="center"><b>14</b></td>
        <td><b>Command to get stakes with relevant stake identifiers of match identifiers.</b></td>
    </tr>
    <tr>
        <td align="center"><b>GetStakeTypeGroups</b></td>
        <td align="center"><b>15</b></td>
        <td><b>Command to get stake type groups.</b></td>
    </tr>
    <tr>
        <td align="center">TestError</td>
        <td align="center">666</td>
        <td>Command to get test error.</td>
    </tr>
    <tr>
        <td align="center">SetSettings</td>
        <td align="center">10000</td>
        <td>Command to set client settings.</td>
    </tr>
    <tr>
        <td align="center">GetSettings</td>
        <td align="center">10001</td>
        <td>Command to get client settings.</td>
    </tr>
    <tr>
        <td align="center"><b>Echo</b></td>
        <td align="center"><b>10002</b></td>
        <td><b>Command to check connection.</b></td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>WSResponse</b></p>
            <p>This is a class for response of WS server. All responses are being written by this class.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            Enumeration of type <b>WSResponseResult</b>. Derived from unsigned byte (unsigned 8 bit integer). In serialization it occurs as single byte.
        </td>
        <td>The response result of WS server. 0 - Error, 1 - Ok.</td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">Enumeration of type <b>WSResponseType</b>. Derived from unsigned short (unsigned 16 bit integer). In serialization it occurs as two bytes.</td>
        <td>The response type. Example: 0 - Unknown, 1 - GetSport.</td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">String</td>
        <td>If got any error, it's description will be in this field. In other cases it's mainly empty.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">Signed 32 bit integer</td>
        <td>User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">object</td>
        <td>Could be any object serializable with message pack. Main data is here. Can determine to which object should cast, by RT field.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>WSResponseResult</b></p>
            <p>Enumeration, derived from unsigned byte (unsigned 8 bit integer). In serialization it occurs as single byte.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Enum member</b></td>
        <td align="center"><b>Byte value</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">Error</td>
        <td align="center">0</td>
        <td>Error occurred, details in <b>WSResponse</b> object's <b>INF</b> field.</td>
    </tr>
    <tr>
        <td align="center">Ok</td>
        <td align="center">1</td>
        <td>Is normal response without error.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>WSResponseType</b></p>
            <p>Enumeration, derived from unsigned short (unsigned 16 bit integer). In serialization it occurs as two bytes.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Enum member</b></td>
        <td align="center"><b>Ushort value</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">Unknown</td>
        <td align="center">0</td>
        <td>Occurs while getting error, or at an unknown situation.</td>
    </tr>
    <tr>
        <td align="center">GetSport</td>
        <td align="center">3</td>
        <td>The response type for GetSport functionality.</td>
    </tr>
    <tr>
        <td align="center">GetTournament</td>
        <td align="center">7</td>
        <td>The response type for GetTournament functionality.</td>
    </tr>
    <tr>
        <td align="center">GetChampionship</td>
        <td align="center">8</td>
        <td>The response type for GetChampionship functionality.</td>
    </tr>
    <tr>
        <td align="center">GetDetailedTree</td>
        <td align="center">11</td>
        <td>The response type for GetDetailedTree functionality.</td>
    </tr>
    <tr>
        <td align="center">GetDetailedMatches</td>
        <td align="center">12</td>
        <td>The respose type for GetDetailedMatches functionality.</td>
    </tr>
    <tr>
        <td align="center">GetDetailedStakes</td>
        <td align="center">13</td>
        <td>The respose type for GetDetailedStakes functionality.</td>
    </tr>
    <tr>
        <td align="center">SetSettings</td>
        <td align="center">10000</td>
        <td>The response type for SetSettings functionality.</td>
    </tr>
    <tr>
        <td align="center">GetSettings</td>
        <td align="center">10001</td>
        <td>The response type for GetSettings functionality.</td>
    </tr>
    <tr>
        <td align="center">Echo</td>
        <td align="center">10002</td>
        <td>The respose type for Echo functionality.</td>
    </tr>
</table>

## Informative Requests

The **URL** of the request is wss://example.com.ru/odds?key=your_request_key.

### Entities (Informative Requests)

All same layer entities should be sorted by **"ORD"** field at first, than by **"NM"** at client side.

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>GetMatchesRequestModel</b></p>
            <p>Describes the GetMatchesRequestModel entity, it's sent with request for getting the matches.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">FPrd</td>
        <td align="center">bool</td>
        <td>Indicates whether it's necessary to fill match periods</td>
    </tr>
    <tr>
        <td align="center">FSTP</td>
        <td align="center">bool</td>
        <td>Indicates whether it's necessary to fill stake types reference</td>
    </tr>
    <tr>
        <td align="center">FS</td>
        <td align="center">bool</td>
        <td>Indicates whether it's necessary to fill stakes of match</td>
    </tr>
    <tr>
        <td align="center">FOC</td>
        <td align="center">bool</td>
        <td>Indicates whether it's necessary to fill stakes count of match</td>
    </tr>
    <tr>
        <td align="center">MIds</td>
        <td align="center">[]int</td>
        <td>Indicates match identifiers</td>
    </tr>
    <tr>
        <td align="center">STPIds</td>
        <td align="center">[]int</td>
        <td>Indicates stake types identifiers</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>Sport</b></p>
            <p>Describes the sport entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">GID</td>
        <td align="center">Guid (128 bit integer. Universal graphic user id.)</td>
        <td>Indicates the entity identifier (Sport item).</td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">Int (32-bit signed integer)</td>
        <td>Indicates the entity identifier.</td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the name of the entity.</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">Int (32-bit signed integer)</td>
        <td>Indicates the ordering number, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">CHMPS</td>
        <td align="center">Array of <b>"Championship"</b> entities</td>
        <td>Indicates the array of the championships of the sport.</td>
    </tr>
    <tr>
        <td align="center">PF</td>
        <td align="center">
            Collection of keys and values (Dictionary {Key,Value}), where the Key is int (32-bit signed integer), the Value is array of <b>"Profit"</b> entities.
        </td>
        <td>
            Collection of keys and values, where the key is stake type identifier, the value is array of <b>"Profit"</b> entities. Each stake type identifier can have several profits depending on the main type and whether it is for live or pre-match event.
        </td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">Long (64-bit signed integer)</td>
        <td>Indicates fresh date of the item.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>Profit</b></p>
            <p>Describes the profit entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">MT</td>
        <td align="center">Byte (8-bit unsigned integer)</td>
        <td>Indicates the main type (0 - none, 1 - Main, 2 - SuperMain).</td>
    </tr>
    <tr>
        <td align="center">PF</td>
        <td align="center">Double (64-bit double-precision floating point type)</td>
        <td>Indicates the profit.</td>
    </tr>
    <tr>
        <td align="center">IsL</td>
        <td align="center">Bool</td>
        <td>Indicates whether the profit is for live or pre-match event. </td>
    </tr>
    <tr>
        <td align="center">Old</td>
        <td align="center">Int (32-bit signed integer)</td>
        <td>Indicates the identifier of the object (Tournament identifier, sport identifier, match identifier).</td>
    </tr>
    <tr>
        <td align="center">OGId</td>
        <td align="center">Nullable Guid</td>
        <td>Indicates the graphic user identifier of the object.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>Championship</b></p>
            <p>Describes the championship entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">GID</td>
        <td align="center">Guid</td>
        <td>Indicates the entity identifier (Championship item).</td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">Int (32-bit signed integer)</td>
        <td>Indicates the entity identifier.</td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the name of the entity.</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">Int (32-bit signed integer)</td>
        <td>Indicates the ordering number, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">TRNMS</td>
        <td align="center">Array of <b>"Tournament"</b> entities.</td>
        <td>Indicates the tournaments of the championship.</td>
    </tr>
    <tr>
        <td align="center">SID</td>
        <td align="center">Guid</td>
        <td>Indicates the universal graphic user identifier of sport of that championship.</td>
    </tr>
    <tr>
        <td align="center">DLID</td>
        <td align="center">Long (64 bit signed integer)</td>
        <td>Indicates the default language Identifier for the championship. It' used to determine flags.</td>
    </tr>
    <tr>
        <td align="center">SIID</td>
        <td align="center">Int (32-bit signed integer)</td>
        <td>Indicates the sport identifier of that championship.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">Long (64 bit signed integer)</td>
        <td>Indicates fresh date of the item.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>Tournament</b></p>
            <p>Describes the tournament entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">GID</td>
        <td align="center">Guid</td>
        <td>Indicates the entity identifier (Tournament item).</td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the entity identifier.</td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the name of the entity. </td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the ordering number, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">MTCHS</td>
        <td align="center">Array of <b>"DetailedMatch"</b> entities</td>
        <td>Indicates the matches of the tournament.</td>
    </tr>
    <tr>
        <td align="center">CHID</td>
        <td align="center">Guid</td>
        <td>Indicates the universal graphic user identifier of championship of the tournament.</td>
    </tr>
    <tr>
        <td align="center">CMNT</td>
        <td align="center">String</td>
        <td>Indicates the comment of the tournament.</td>
    </tr>
    <tr>
        <td align="center">IsF</td>
        <td align="center">Bool</td>
        <td>Indicates whether the tournament Is favorite.</td>
    </tr>
    <tr>
        <td align="center">PF</td>
        <td align="center">
            Collection of keys and values, where the key is int (32-bit signed integer), the value is array of <b>"Profit"</b> entities.
        </td>
        <td>
            Collection of keys and values, where the key is stake type identifier, the value is array of <b>"Profit"</b> entities. Each stake type identifier can have several profits depending on the main type and whether it is for live or pre-match event.
        </td>
    </tr>
    <tr>
        <td align="center">CHIID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the championship identifier of the tournament.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">Long (64-bit signed integer)</td>
        <td>Indicates the fresh date of the item.</td>
    </tr>
    <tr>
        <td align="center">RFID</td>
        <td align="center">int (32-bit signed integer) </td>
        <td>Indicates the reference identifier of the tournament.</td>
    </tr>
    <tr>
        <td align="center">IED</td>
        <td align="center">Bool</td>
        <td>Indicates whether the express is denied for this tournament or not. </td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>Match</b></p>
            <p>Describes the match entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the entity identifier.</td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the name of the entity (Empty in this request).</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the ordering number, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">MT</td>
        <td align="center">Enumeration of type <b>"MatchType"</b>.</td>
        <td>Indicates the type of the match (0 - pre-match, 1 - live, 2 - both).</td>
    </tr>
    <tr>
        <td align="center">PID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates parent match identifier. If match is not period, it will be equal to 0.</td>
    </tr>
    <tr>
        <td align="center">TID</td>
        <td align="center">Guid</td>
        <td>Indicates the universal graphic user identifier of the tournament of that match. </td>
    </tr>
    <tr>
        <td align="center">DTTCKS</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Ticks from Unix epoch (1970-01-01 00:00:00) to start date of match.</td>
    </tr>
    <tr>
        <td align="center">HLTV</td>
        <td align="center">bool</td>
        <td>Indicates whether the match has live TV.</td>
    </tr>
    <tr>
        <td align="center">IsF</td>
        <td align="center">bool</td>
        <td>Indicates whether the match Is Favorite.</td>
    </tr>
    <tr>
        <td align="center">HSU</td>
        <td align="center">bool</td>
        <td>Indicates whether the match has scout URL or not.</td>
    </tr>
    <tr>
        <td align="center">PF</td>
        <td align="center">
        Collection of keys and values, where the key is int (32-bit signed integer), the value is array of <b>"Profit"</b> entities.</td>
        <td>
            Collection of keys and values, where the key is stake type identifier, the value is array of <b>"Profit"</b> entities. Each stake type identifier can have several profits depending on the main type and whether it is for live or pre-match event.
        </td>
    </tr>
    <tr>
        <td align="center">TIID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the tournament identifier of that match.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">long (64-bit signed integer) </td>
        <td>Indicates the fresh date of the item.</td>
    </tr>
    <tr>
        <td align="center">ShID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the short identifier of the match.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>MatchType</b></p>
            <p>Enumeration, derived from byte (signed 8 bit integer), in serialization occurs as single byte.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Enum member</b></td>
        <td align="center"><b>Byte value</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">Prematch</td>
        <td align="center">0</td>
        <td>Indicates the match to be only pre-match.</td>
    </tr>
    <tr>
        <td align="center">Live</td>
        <td align="center">1</td>
        <td>Indicates the match to be only live.</td>
    </tr>
    <tr>
        <td align="center">Both</td>
        <td align="center">2</td>
        <td>Indicates the match to be both live and pre-match.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>xMatch</b></p>
            <p>Describes the extended match entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the entity identifier. </td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the name of the entity (empty in this request). </td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the ordering number, which is used to sort the entity. </td>
    </tr>
    <tr>
        <td align="center">MT</td>
        <td align="center">Enumeration of type <b>"MatchType"</b></td>
        <td>Indicates the type of the match (0 - pre-match, 1 - live, 2 - both).</td>
    </tr>
    <tr>
        <td align="center">PID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates parent match identifier. If match is not period, it will be equal to zero.</td>
    </tr>
    <tr>
        <td align="center">PRID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the period identifier of the match. </td>
    </tr>
    <tr>
        <td align="center">PTID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the part type identifier of the match. </td>
    </tr>
    <tr>
        <td align="center">TID</td>
        <td align="center">Guid</td>
        <td>Indicates the tournament identifier of the match. </td>
    </tr>
    <tr>
        <td align="center">CMNT</td>
        <td align="center">String</td>
        <td>Indicates the comment of the match. </td>
    </tr>
    <tr>
        <td align="center">HNM</td>
        <td align="center">String</td>
        <td>Indicates the name of home team. </td>
    </tr>
    <tr>
        <td align="center">ANM</td>
        <td align="center">String</td>
        <td>Indicates the name of away team. </td>
    </tr>
    <tr>
        <td align="center">ISA</td>
        <td align="center">bool</td>
        <td>Indicates whether the match is active or not.</td>
    </tr>
    <tr>
        <td align="center">BS</td>
        <td align="center">bool</td>
        <td>Indicates the temporary activeness of the match. </td>
    </tr>
    <tr>
        <td align="center">HS</td>
        <td align="center">nullable int (int?), (32 bit signed integer)</td>
        <td>Indicates home team score. </td>
    </tr>
    <tr>
        <td align="center">AS</td>
        <td align="center">nullable int (int?), (32 bit signed integer)</td>
        <td>Indicates way team score. </td>
    </tr>
    <tr>
        <td align="center">TM</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the time of the match. </td>
    </tr>
    <tr>
        <td align="center">SD</td>
        <td align="center">byte (8 bit signed byte)</td>
        <td>Indicates the second of the match. </td>
    </tr>
    <tr>
        <td align="center">SS</td>
        <td align="center">String</td>
        <td>Indicates the score of the match. </td>
    </tr>
    <tr>
        <td align="center">SAS</td>
        <td align="center">String</td>
        <td>Indicates the alternative score of the match. </td>
    </tr>
    <tr>
        <td align="center">GS</td>
        <td align="center">String</td>
        <td>Indicates the score of the game. </td>
    </tr>
    <tr>
        <td align="center">SC</td>
        <td align="center">int (32 bit signed integer)</td>
        <td>Indicates the count of the stake. </td>
    </tr>
    <tr>
        <td align="center">TC</td>
        <td align="center">String</td>
        <td>Indicates the comment of the time of the match. </td>
    </tr>
    <tr>
        <td align="center">SRV</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the turn of serving team. </td>
    </tr>
    <tr>
        <td align="center">ShID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the short identifier of the match. </td>
    </tr>
    <tr>
        <td align="center">H2HId</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates head to head identifier of the match. </td>
    </tr>
    <tr>
        <td align="center">PRDS</td>
        <td align="center">Array of <b>"xMatch"</b> entities</td>
        <td>Indicates the periods of the match.Example: 1st half, 2nd half, corners, etc..</td>
    </tr>
    <tr>
        <td align="center">STKTPS</td>
        <td align="center">Array of <b>"StakeType"</b> entities</td>
        <td>Indicates the stake types of stakes in the match. </td>
    </tr>
    <tr>
        <td align="center">STKS</td>
        <td align="center">Array of <b>"Stake"</b> entities</td>
        <td>Indicates the stakes of the match. </td>
    </tr>
    <tr>
        <td align="center">TIID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the tournament identifier of that match.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Indicates the fresh date of the item.</td>
    </tr>
    <tr>
        <td align="center">CRPRD</td>
        <td align="center">short (16-bit signed integer)</td>
        <td>Indicates the current period identifier of the match.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>StakeType</b></p>
            <p>Describes the stake type entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake type identifier.</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates Ordering number, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the stake type name.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>StakeTypesGroup</b></p>
            <p>Describes the stake types group entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake type group identifier.</td>
    </tr>
    <tr>
        <td align="center">IsA</td>
        <td align="center">bool</td>
        <td>Indicates all the stake types included in the relevant sport.</td>
    </tr>
    <tr>
        <td align="center">OF</td>
        <td align="center">bool</td>
        <td>Indicates the group of favorite stake types.</td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the stake types group name.</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the ordering number.</td>
    </tr>
    <tr>
        <td align="center">SId</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the sport identifier.</td>
    </tr>
    <tr>
        <td align="center">STId</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake type identifier.</td>
    </tr>
    <tr>
        <td align="center">CT</td>
        <td align="center">byte (8-bit unsigned integer)</td>
        <td>Indicates the change type.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Indicates fresh date of the item.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>Stake</b></p>
            <p>Describes the stake entity.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake identifier.</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the ordering number, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">String</td>
        <td>Indicates the stake name.</td>
    </tr>
    <tr>
        <td align="center">FNM</td>
        <td align="center">String</td>
        <td>Indicates the full name of the stake.</td>
    </tr>
    <tr>
        <td align="center">SNM</td>
        <td align="center">String</td>
        <td>Indicates the short name of the stake.</td>
    </tr>
    <tr>
        <td align="center">TID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake type identifier.</td>
    </tr>
    <tr>
        <td align="center">TNM</td>
        <td align="center">String</td>
        <td>Indicates the stake type of the name.</td>
    </tr>
    <tr>
        <td align="center">CD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake code.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the match identifier which stake belongs to.</td>
    </tr>
    <tr>
        <td align="center">FCR</td>
        <td align="center">double (64-bit doubleprecision floating point type)</td>
        <td>Indicates the stake factor.</td>
    </tr>
    <tr>
        <td align="center">ARG</td>
        <td align="center">nullable double (double?), (64 bit floating-point value)</td>
        <td>Indicates the argument of the stake. Null if the stake hasn't got an argument.</td>
    </tr>
    <tr>
        <td align="center">OID</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Indicates the ordering identifier, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">SOID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the order identifier of the stake, which used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">ISCO</td>
        <td align="center">bool</td>
        <td>Indicates whether the cashout is enabled or not.</td>
    </tr>
    <tr>
        <td align="center">SS</td>
        <td align="center">bool</td>
        <td>Indicates the argument sign of the stake.</td>
    </tr>
    <tr>
        <td align="center">PFF</td>
        <td align="center">double? (nullable 64-bit double-precision floating point type)</td>
        <td>
            Indicates the calculated factor. PFF is calculated factor with margin in stake layer (could be null, when PFF is null you must take margin from PF). 
            PF includes margins per stake type (Find PF in <b>"Sport"</b>, <b>Tournament</b>, <b>"Match"</b> entities).
        </td>
    </tr>
    <tr>
        <td align="center">IsM</td>
        <td align="center">bool</td>
        <td>Indicates whether stake is main or not.</td>
    </tr>
    <tr>
        <td align="center">IsSM</td>
        <td align="center">bool</td>
        <td>Indicates whether stake is super main or not.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Indicates fresh date of the item.</td>
    </tr>
    <tr>
        <td align="center">TSNM</td>
        <td align="center">String</td>
        <td>Indicates the short name of the stake type.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>DetailedMatch</b></p>
            <p>Describes the detailed match data.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">string</td>
        <td>Indicates the name of the match.</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the ordering number used to sort the match.</td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the unique identifier of the match.</td>
    </tr>
    <tr>
        <td align="center">TID</td>
        <td align="center">Guid</td>
        <td>Indicates the graphic user identifier of the tournament of the match.</td>
    </tr>
    <tr>
        <td align="center">TIID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the identifier of the tournament of that match.</td>
    </tr>
    <tr>
        <td align="center">MT</td>
        <td align="center">Enumeration of type <b>"MatchType"</b></td>
        <td>Indicates the type of the match (0 - pre-match, 1 - live, 2 - both).</td>
    </tr>
    <tr>
        <td align="center">PID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates parent match identifier. If match is not period, it will be equal to zero.</td>
    </tr>
    <tr>
        <td align="center">DTTCKS</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Ticks from Unix epoch (1970-01-01 00:00:00) to start the date of the match.</td>
    </tr>
    <tr>
        <td align="center">HLTV</td>
        <td align="center">bool</td>
        <td>Indicates whether the match has live TV or not.</td>
    </tr>
    <tr>
        <td align="center">HSU</td>
        <td align="center">bool</td>
        <td>Indicates whether the match has scout URL or not.</td>
    </tr>
    <tr>
        <td align="center">IsF</td>
        <td align="center">bool</td>
        <td>Indicates whether the match Is Favorite or not.</td>
    </tr>
    <tr>
        <td align="center">PF</td>
        <td align="center">Collection of keys and values (Dictionary {Key,Value}), where the Key is int (32-bit signed integer), the Value is array of <b>"Profit"</b> entities.</td>
        <td>Collection of keys and values, where the key is stake type identifier, the value is array of <b>"Profit"</b> entities. Each stake type identifier can have several profits depending on the main type and whether it is for live or pre-match event.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Indicates fresh date of the item.</td>
    </tr>
    <tr>
        <td align="center">CMNT</td>
        <td align="center">string</td>
        <td>Indicates the comment of the match.</td>
    </tr>
    <tr>
        <td align="center">HNM</td>
        <td align="center">string</td>
        <td>Indicates the name of home team.</td>
    </tr>
    <tr>
        <td align="center">ANM</td>
        <td align="center">string</td>
        <td>Indicates the name of away team.</td>
    </tr>
    <tr>
        <td align="center">PTID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the part type identifier of the match.</td>
    </tr>
    <tr>
        <td align="center">PRID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the period identifier of the match.</td>
    </tr>
    <tr>
        <td align="center">ISA</td>
        <td align="center">bool</td>
        <td>Indicates whether the match is active or not.</td>
    </tr>
    <tr>
        <td align="center">BS</td>
        <td align="center">bool</td>
        <td>Indicates the temporary activeness of the match.</td>
    </tr>
    <tr>
        <td align="center">HS</td>
        <td align="center">int? (nullable 32-bit signed integer)</td>
        <td>Indicates home team score.</td>
    </tr>
    <tr>
        <td align="center">AS</td>
        <td align="center">int? (nullable 32-bit signed integer)</td>
        <td>Indicates away team score.</td>
    </tr>
    <tr>
        <td align="center">TM</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the time of the match.</td>
    </tr>
    <tr>
        <td align="center">SD</td>
        <td align="center">byte (8-bit unsigned integer)</td>
        <td>Indicates the second of the match.</td>
    </tr>
    <tr>
        <td align="center">SS</td>
        <td align="center">string</td>
        <td>Indicates the score of the match.</td>
    </tr>
    <tr>
        <td align="center">SAS</td>
        <td align="center">string</td>
        <td>Indicates the alternative score of the match.</td>
    </tr>
    <tr>
        <td align="center">GS</td>
        <td align="center">string</td>
        <td>Indicates the score of the game.</td>
    </tr>
    <tr>
        <td align="center">SC</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake count.</td>
    </tr>
    <tr>
        <td align="center">SRV</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the turn of serving team.</td>
    </tr>
    <tr>
        <td align="center">TC</td>
        <td align="center">string</td>
        <td>Indicates the status of the live match.</td>
    </tr>
    <tr>
        <td align="center">ShID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the short identifier of the match.</td>
    </tr>
    <tr>
        <td align="center">H2HId</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates Head To Head identifier of the match.</td>
    </tr>
    <tr>
        <td align="center">STKS</td>
        <td align="center">Array of <b>"DetailedStake"</b> entities.</td>
        <td>Indicates the detailed stakes of the match.</td>
    </tr>
    <tr>
        <td align="center">STKTPS</td>
        <td align="center">Array of <b>"StakeType"</b> entities.</td>
        <td>Indicates the stake types of the stakes in the match.</td>
    </tr>
    <tr>
        <td align="center">PRDS</td>
        <td align="center">Array of <b>"DetailedMatch"</b> entities.</td>
        <td>Indicates the periods of the match.</td>
    </tr>
    <tr>
        <td align="center">RFID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the reference identifier of the match.</td>
    </tr>
    <tr>
        <td align="center">FEID</td>
        <td align="center">string</td>
        <td>Indicates match identifier of the feed.</td>
    </tr>
    <tr>
        <td align="center">FPID</td>
        <td align="center">nullable byte (8 bit signed byte)</td>
        <td>Indicates provider identifier of the feed.</td>
    </tr>
    <tr>
        <td align="center">TSH1</td>
        <td align="center">nullable ushort (unsigned 16 bit integer)</td>
        <td>Indicates home team shirt identifier.</td>
    </tr>
    <tr>
        <td align="center">TSH2</td>
        <td align="center">nullable ushort (unsigned 16 bit integer)</td>
        <td>Indicates away team shirt identifier.</td>
    </tr>
    <tr>
        <td align="center">HCIDS</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates home competitor identifier.</td>
    </tr>
    <tr>
        <td align="center">ACIDS</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates away competitor identifier.</td>
    </tr>
    <tr>
        <td align="center">ISED</td>
        <td align="center">bool</td>
        <td>Indicates whether the express is denied or not.</td>
    </tr>
    <tr>
        <td align="center">ISOD</td>
        <td align="center">bool</td>
        <td>Indicates whether the ordinar is denied or not.</td>
    </tr>
    <tr>
        <td align="center">ISLF</td>
        <td align="center">bool</td>
        <td>Indicates whether the live match is finished or not.</td>
    </tr>
    <tr>
        <td align="center">ISBU</td>
        <td align="center">bool</td>
        <td>Indicates whether the match is blocked up or not.</td>
    </tr>
    <tr>
        <td align="center">ISLS</td>
        <td align="center">bool</td>
        <td>Indicates whether the live match is started or not.</td>
    </tr>
    <tr>
        <td align="center">STKTPSG</td>
        <td align="center">StakeTypesGroup[]</td>
        <td>Indicates the group of the stake types.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>DetailedStake</b></p>
            <p>Describes the detailed stake data.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">NM</td>
        <td align="center">string</td>
        <td>Indicates the name of the stake.</td>
    </tr>
    <tr>
        <td align="center">ORD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the ordering number used to sort the stake.</td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the unique identifier of the stake.</td>
    </tr>
    <tr>
        <td align="center">TID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the stake type identifier.</td>
    </tr>
    <tr>
        <td align="center">TNM</td>
        <td align="center">string</td>
        <td>Indicates the name of the stake type.</td>
    </tr>
    <tr>
        <td align="center">CD</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the code of the stake.</td>
    </tr>
    <tr>
        <td align="center">ARG</td>
        <td align="center">double? (nullable 64-bit double-precision floating point type)</td>
        <td>Indicates the argument of the stake. Null if the stake hasn't got an argument.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the match identifier, which the stake belongs to.</td>
    </tr>
    <tr>
        <td align="center">FNM</td>
        <td align="center">string</td>
        <td>Indicates the full name of the stake.</td>
    </tr>
    <tr>
        <td align="center">SNM</td>
        <td align="center">string</td>
        <td>Indicates the short name of the stake.</td>
    </tr>
    <tr>
        <td align="center">OID</td>
        <td align="center">long (64-bit signed integer)</td>
        <td>Indicates the ordering identifier, which is used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">SOID</td>
        <td align="center">int (32-bit signed integer)</td>
        <td>Indicates the order identifier of the stake, which used to sort the entity.</td>
    </tr>
    <tr>
        <td align="center">ISCO</td>
        <td align="center">bool</td>
        <td>Indicates whether the cashout is enabled.</td>
    </tr>
    <tr>
        <td align="center">SS</td>
        <td align="center">bool</td>
        <td>Indicates the argument sign of the stake.</td>
    </tr>
    <tr>
        <td align="center">PFF</td>
        <td align="center">nullable double (64-bit double-precision floating point type)</td>
        <td>Indicates the calculated factor. PFF is calculated factor with margin in stake layer (could be null, when PFF is null you must take margin from PF). 
            PF includes margins per stake type (Find PF in <b>"Sport"</b>, <b>"Tournament"</b>, <b>"Match"</b> entities).</td>
    </tr>
    <tr>
        <td align="center">ISM</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is main or not.</td>
    </tr>
    <tr>
        <td align="center">ISSM</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is super main or not.</td>
    </tr>
    <tr>
        <td align="center">IFD</td>
        <td align="center">bool</td>
        <td>Indicates the fresh date of the item.</td>
    </tr>
    <tr>
        <td align="center">ISA</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is active or not.</td>
    </tr>
    <tr>
        <td align="center">ISL</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is live or not.</td>
    </tr>
    <tr>
        <td align="center">ISV</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is visible or not.</td>
    </tr>
    <tr>
        <td align="center">ISVC</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is visible for client or not.</td>
    </tr>
    <tr>
        <td align="center">ISF</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is favorite or not.</td>
    </tr>
    <tr>
        <td align="center">ISED</td>
        <td align="center">bool</td>
        <td>Indicates whether the express is denied or not.</td>
    </tr>
    <tr>
        <td align="center">ISE</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is extended or not.</td>
    </tr>
    <tr>
        <td align="center">ISI</td>
        <td align="center">bool</td>
        <td>Indicates whether the stake is individual or not.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>GetStakesRequestModel</b></p>
            <p>Describes the GetStakesRequestModel entity. It's sent with request for getting the stakes.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">MIds</td>
        <td align="center">Array of ints.</td>
        <td>Indicates the match identifiers.</td>
    </tr>
    <tr>
        <td align="center">STPIds</td>
        <td align="center">Array of ints.</td>
        <td>Indicates the stake type identifiers.</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td align="center" colspan="3">
            <p><b>StakesGroupModel</b></p>
            <p>Describes the StakesGroupModel entity. It's sent with request for getting stake type groups.</p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Type</b></td>
        <td align="center"><b>Description</b></td>
    </tr>
    <tr>
        <td align="center">StakeTypesGroups</td>
        <td align="center">Collection of keys and values, where the Key is int32, the Value is a StakeTypesGroup entity. The int32 is a stake type group identifier.</td>
        <td>Indicates the groups of the stake types.</td>
    </tr>
    <tr>
        <td align="center">StakeTypes</td>
        <td align="center">Collection of keys and values, where the Key is int32, the Value is a list of int32. The int32 is a stake type identifier.</td>
        <td>Indicates the stake types.</td>
    </tr>
</table>

## GetDetailedTree

The request gets pre-match and live tree in details.

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetDetailedTree</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 11</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">
            Array of <b>objects</b>, <b>object[]</b>;<br>
            <b>Length: 3</b><br>
            <b>1st element ( arr[0], int)</b>: The Time Filter (<b>0</b> - No Filter, <b>1</b> - 7 Days, <b>2</b> - 3 Days, <b>3</b> - 1 Day, <b>4</b> - 12 Hours, <b>5</b> - 6 Hours, <b>6</b> - 3 Hours, <b>7</b> - 1 Hour, <b>8</b> - 2 Hours, <b>9</b> - 2 Days<br>
            <b>2rd element ( arr[1], bool)</b>: If the property is true, all stakes will be returned in the tree, if the property is false, the stakes won't be returned in the tree.<br>
            <b>3th element ( arr[2], int8)</b>: Indicates the type of the match (0 - pre-match, 1 - live, 2 - both)<br>
        </td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetDetailedTree</b> - 11 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Array of <b>"Sport"</b> entities.(The data of the match is in details).</td>
    </tr>
</table>

## GetDetailedMatches

The limit (max 100 IDs) exists in here. In case of the limit being exceeded "The quantity of Match IDs exceeds 100." message will be received in the INF property.

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetDetailedMatches</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 12</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Object of <b>"GetMatchesRequestModel"</b> entity.</td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetDetailedMatches</b> - 12 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Array of <b>"DetailedMatches"</b> entities.</td>
    </tr>
</table>

## GetDetailedStakes

The limit (max 100 IDs) exists in here. In case of the limit being exceeded "The quantity of Match IDs exceeds 100." message will be received in the INF property.

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetDetailedStakes</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 13</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Object of <b>"GetStakesRequestModel"</b> entity.</td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetDetailedStakes</b> - 13 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Array of <b>"DetailedStakes"</b> entities.</td>
    </tr>
</table>

## GetDetailedStakesById

The method gets the stakes with relevant stake identifiers of match identifiers sent by request.

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetDetailedStakesById</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 14</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Collection of keys and values, where the Key is a match identifier (32-bit signed integer), the Value is a list of stake type identifiers.</td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetDetailedStakesById</b> - 14 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Collection of keys and values, where the Key is a match identifier (32-bit signed integer), the Value is a list of <b>DetailedStake</b>.</td>
    </tr>
</table>

## GetStakeTypeGroups

The method gets stake type groups.

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetStakeTypeGroups</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 15</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">[]int</td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetStakeTypeGroups</b> - 15 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Collection of keys and values, where the Key is a sport identifier (32-bit signed integer), the Value is a list of custom class (<b>StakesGroupModel</b>), which includes StakeTypesGroups and StakeTypes.</td>
    </tr>
</table>

## GetTournament

The request gets the tournament data with the following identifier, and depending on the parameters, it can get the matches as well.

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetTournament</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 6</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">
            Array of <b>objects</b>. (32 bit signed integers), object[];<br>
            <b>Length: 3</b><br>
            <b>1st element (arr[0], Guid)</b>: The ID of Tournament.<br>
            <b>2nd element (arr[1], int)</b>: Indicates whether it's necessary to fill tournament's tree: 0 - if it's necessary, 1 - if it's not necessary.<br>
            <b>3rd element (arr[2], int)</b>: Indicates whether it's necessary to get tournament to live page: 0 - if pre-match page is necessary, 1 - if live page is not necessary.<br>
        </td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetTournament</b> - 7 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Single <b>"Tournament"</b> entity.</td>
    </tr>
</table>

## GetChampionship

The request gets the championship data with the following identifier, and depending on the parameters, it can get both the matches and the tournament as well. 

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetChampionship</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 7</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">
            Array of <b>objects</b>. (32 bit signed integers), object[];<br>
            <b>Length: 3</b><br>
            <b>1st element (arr[0], Guid)</b>: The ID of Championship.<br>
            <b>2nd element (arr[1], int)</b>: Indicates whether it's necessary to fill championship's tree: 0 - if it's not necessary, 1 - if it's necessary.<br>
            <b>3rd element (arr[2], int)</b>: Indicates whether it's not necessary to get championship to live page, 0 - if pre-match page is necessary, 1 - if live page is necessary.<br>
        </td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetChampionship</b> - 8 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Single <b>"Championship"</b> entity.</td>
    </tr>
</table>

## GetSport

The request gets the data of the sport with the following identifier, and depending on the parameters it can get the tree as well 

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>GetSport</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 2</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">
            Array of <b>objects</b>. (32 bit signed integers), object[];<br>
            <b>Length: 3</b><br>
            <b>1st element (arr[0], Guid)</b>: The ID of Sport.<br>
            <b>2nd element (arr[1], int)</b>: Indicates whether it's necessary to fill sport's tree: 0 - if it's not necessary, 1 - if it's necessary.<br>
            <b>3rd element (arr[2], int)</b>: Indicates whether it's necessary to get sport to live page: 0 - if pre-match page is necessary, 1 - live page is necessary.<br>
        </td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>GetSport</b> - 3 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">Single <b>"Sport"</b> entity.</td>
    </tr>
</table>

## Echo

The request verifies the connection with server.

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>Echo</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 10002</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">null</td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>Echo</b> - 10002 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.<br>Example: Connected.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">null</td>
    </tr>
</table>

## SetSettings

The request sets client settings(language).

### Request

<table>
    <tr>
        <td align="center" colspan="3">
            <p>via <b>WSRequest</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">CMD</td>
        <td align="center">
            <b>SetSettings</b> member of <b>WSCommand</b> enum, unsigned 16 bit integer, <b>Value = 10000</b>.
        </td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">
            int (32 bit signed integers); Indicates <b>language</b> identifier.<br>
        </td>
    </tr>
</table>

### Response

<table>
    <tr>
        <td align="center" colspan="3">
            <p>WSResponse</b></p>
        </td>
    </tr>
    <tr>
        <td align="center"><b>Field</b></td>
        <td align="center"><b>Value</b></td>
    </tr>
    <tr>
        <td align="center">RR</td>
        <td align="center">
            <b>Error</b> - 0 (unsigned byte), if any error occurred.<br>
            <b>Ok</b> - 1 (unsigned byte), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">RT</td>
        <td align="center">
            <b>Unknown</b> - 0 (unsigned 16 bit integer), if any error occurred.<br>
            <b>SetSettings</b> - 10000 (unsigned 16 bit integer), if no error occurred.<br>
        </td>
    </tr>
    <tr>
        <td align="center">INF</td>
        <td align="center">UTF - 8 encoded string description of error - if any error occurred, empty - if no error occurred.</td>
    </tr>
    <tr>
        <td align="center">MID</td>
        <td align="center">User identifier</td>
    </tr>
    <tr>
        <td align="center">DATA</td>
        <td align="center">null</td>
    </tr>
</table>

## Entities Sorting Logic
<table>
    <tr>
        <td>1.</td>
        <td><b>Sport</b> - Sort first by <b>ORD</b>, then by <b>NM</b>.</td>
    </tr>
    <tr>
        <td>2.</td>
        <td><b>Championship</b> - Sort first by <b>ORD</b>, then by <b>NM</b>.</td>
    </tr>
    <tr>
        <td>3.</td>
        <td><b>Tournament</b> - Sort first by <b>ORD</b>, then by <b>NM</b>.</td>
    </tr>
    <tr>
        <td>4.</td>
        <td><b>DetailedMatch</b> - Sort first by <b>ORD</b>, then by <b>DTTCKS</b>, then by <b>NM</b>.</td>
    </tr>
    <tr>
        <td>5.</td>
        <td><b>DetailedMatch (as Period)</b> - Sort first by <b>ORD</b>, then by <b>PTID</b>, then by <b>PRID</b>, then by <b>NM</b>.</td>
    </tr>
    <tr>
        <td>6.</td>
        <td><b>DetailedStake</b> - Sort first by <b>ORD</b>, then by <b>OID</b>, then by <b>TID</b>, then by <b>SOID</b>, then by <b>CD</b>.</td>
    </tr>
</table>

## The List of Languages

|Language ID|Language Name|Short Name|
|:---:|:---:|:---:|
|1|Русский / Russian|ru|
|2|English|en|
|3|Հայերեն / Armenian|hy|
|4|Türkçe|tr|
|5|Bosanski|bs|
|6|Farsi / فارسی|Fa|
|7|Arabic (Iraq)|ar|
|8|Српски|sr|
|9|Hrvatski|hr|
|10|Ukrainian|uk|
|11|Kurdish|Ku|
|12|Hebrew|He|
|13|Español|es|
|14|Português|pt|
|15|Italiano|it|
|16|Français|fr|
|17|Deutsch|de|
|18|Korean|ko|
|19|Danish|da|
|20|Finnish|fi|
|21|Czech|cs|
|22|Swedish|sv|
|23|Georgian|ka|
|24|Norwegian|no|
|25|Chinese|zh|
|26|Chinese Traditional|zh-CHT|
|27|Thai|th|
|28|Kazakh|kk|
|29|Azerbaijani|az|
|30|Portuguese (Brazil)|br|
|31|Japanese|ja|
|32|Hindi|hi|
|33|Urdu|ur|
|34|Lietuvių|lt|
|35|Tunisian|tn|
|36|Vietnamese|vn|
|37|Uzbek|uz|
|38|Creole|crp|
|39|Polish|pl|
|40|Albanian|sq-AL|
|41|Amharic|am-ET|
|42|Romanian|ro-RO|
|43|Bahasa Indonesian|id-ID|
|44|Slovakian|sk-SK|
|45|Czech|cs-CS|
|46|Greek|el-GR|

<br>